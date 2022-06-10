<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\ThreedsPaymentRequest;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Services\IyzicoService;
use App\View\Components\Shop\Header;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public $company;
    protected $iyzicoService;

    public function __construct(Header $header, IyzicoService $iyzicoService)
    {
        $this->company = $header->company;
        $this->iyzicoService = $iyzicoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::where(['company_id' => $this->company->id, 'status' => Product::STATUS_ACTIVE])->paginate(20);

        return view('pages.company.index', [
            'products' => $products,
            'company'  => $this->company,
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
        $data = [
            'company_id'      => $this->company->id,
            'name'            => $request->name,
            'surname'         => $request->surname,
            'email'           => $request->email,
            'phone'           => $request->phone,
            'address'         => $request->address,
            'city_id'         => $request->city,
            'county_id'       => $request->county,
            'zip_code'        => $request->zipCode,
            'identity_number' => $request->identityNumber,
            'note'            => $request->note,
            'cargo_price'     => $this->company->cargoPrice(),
            'sub_total_price' => Cart::subtotal(),
            'total_price'     => Cart::total() + $this->company->cargoPrice(),
            'ip_address'      => $request->ip(),
        ];

        try {
            $order             = Order::create($data);
            $threedsInitialize = $this->iyzicoService->threedsInitialize($request, $this->company, $order);

            if ($threedsInitialize->getStatus() !== 'success') {
                throw new \Exception($threedsInitialize->getErrorMessage());
            }

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
        try {
            if ($request->status !== 'success') {
                throw new \Exception($request->mdStatus);
            }

            dd($this->iyzicoService->threedsPayment($request, $request->conversationId));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'message' => $e->getMessage()
            ])->withInput();
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
