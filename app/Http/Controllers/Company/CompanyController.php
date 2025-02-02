<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\ShopFilterRequest;
use App\Http\Requests\ThreedsPaymentRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Product;
use App\Services\IyzicoService;
use App\Services\MailService;
use App\View\Components\Shop\Header;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public $company;
    protected $iyzicoService;
    protected $mailService;

    public function __construct(Header $header, IyzicoService $iyzicoService, MailService $mailService)
    {
        $this->company       = $header->company;
        $this->iyzicoService = $iyzicoService;
        $this->mailService   = $mailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShopFilterRequest $request)
    {
        $products = Product::where(['company_id' => $this->company->id, 'status' => Product::STATUS_ACTIVE])
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', "%$request->search%");
            })
            ->when($request->minAmount || $request->maxAmount, function ($query) use ($request) {
                $query->whereBetween('price', [$request->minAmount, $request->maxAmount]);
            })
            ->when(array_key_exists($request->orderBy, Product::FILTER_ORDER_BY_LIST), function ($query) use ($request) {
                $query->orderBy(Product::FILTER_ORDER_BY_LIST[$request->orderBy][0], Product::FILTER_ORDER_BY_LIST[$request->orderBy][1]);
            })
            ->paginate(20);

        return view('pages.company.index', [
            'products' => $products,
            'company'  => $this->company,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, string $slug)
    {
        $product         = $this->company->product($slug)->firstOrFail();
        $relatedProducts = $product->category->relatedProducts($product->id)->limit(3)->get();

        return view('pages.company.show', [
            'product'         => $product,
            'relatedProducts' => $relatedProducts,
            'companySlug'     => $request->route()->action['slug'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        return view('pages.company.payment.checkout', [
            'company' => $this->company,
            'cities'  => City::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment(PaymentRequest $request)
    {
        try {
            $order             = $this->iyzicoService->createOrder($request, $this->company);
            $threedsInitialize = $this->iyzicoService->threedsInitialize($request, $this->company, $order);

            if ($threedsInitialize->getStatus() !== 'success') {
                throw new \Exception($threedsInitialize->getErrorMessage());
            }

            $order->update(['status' => Order::STATUS_THREEDS]);
            Cart::store($order->id);

            return $threedsInitialize->getHtmlContent();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'message' => $e->getMessage()
            ])->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function threedsPayment(Request $request)
    {
        $order = Order::findOrFail($request->conversationId);

        try {
            if ($request->status !== 'success') {
                throw new \Exception($request->mdStatus);
            }

            $threedsPayment = $this->iyzicoService->threedsPayment($request, $request->conversationId);

            $this->iyzicoService->createOrderPayment($threedsPayment);

            if ($threedsPayment->getStatus() !== 'success') {
                $order->update(['status' => Order::STATUS_ERROR]);

                throw new \Exception($threedsPayment->getErrorMessage());
            }

            $order->update(['status' => Order::STATUS_PAID]);

            foreach ($order->products as $orderProduct) {
                $orderProduct->product->update([
                    'stock' => $orderProduct->product->stock - $orderProduct->quantity
                ]);
            }

            $this->mailService->sendNewOrder($order);

            return redirect()->route($this->company->slug . '.payment.result', [$order->id]);
        } catch (\Exception $e) {
            return redirect()->route($this->company->slug . '.payment.checkout')->withErrors([
                'message' => $e->getMessage()
            ])->withInput();
        }
    }

    /**
     * Show the payment result page.
     *
     * @param  integer  $orderId
     * @return \Illuminate\Http\Response
     */
    public function result(int $orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('pages.company.payment.result', [
            'order'     => $order,
            'company'   => $this->company,
        ]);
    }
}
