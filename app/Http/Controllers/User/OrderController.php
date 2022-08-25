<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderResultRequest;
use App\Http\Requests\SearchRequest;
use App\Models\CargoCompany;
use App\Models\Order;
use App\Models\OrderResult;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\MailService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $orders = Order::where('company_id', Auth::user()->company->id)
            ->where('status', Order::STATUS_PAID)
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')->paginate(10);

        return Inertia::render('User/Order/Index', [
            'data' => $orders,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shipped(SearchRequest $request)
    {
        $orders = Order::with('result')->where('company_id', Auth::user()->company->id)
            ->where('status', Order::STATUS_SHIPPED)
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')->paginate(10);

        return Inertia::render('User/Order/Shipped', [
            'data' => $orders,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed(SearchRequest $request)
    {
        $orders = Order::with('result')->where('company_id', Auth::user()->company->id)
            ->where('status', Order::STATUS_COMPLETED)
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')->paginate(10);

        return Inertia::render('User/Order/Completed', [
            'data' => $orders,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function other(SearchRequest $request)
    {
        $orders = Order::where('company_id', Auth::user()->company->id)
            ->whereIn('status', [Order::STATUS_GIVEN, Order::STATUS_ERROR, Order::STATUS_THREEDS])
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')->paginate(10);

        return Inertia::render('User/Order/Other', [
            'data' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $orderId)
    {
        $order = Order::where([
            'company_id' => Auth::user()->company->id,
            'status'     => Order::STATUS_PAID,
        ])->findOrFail($orderId);

        $cargoCompanies = CargoCompany::where('status', CargoCompany::STATUS_ACTIVE)->get();

        return Inertia::render('User/Order/Create', [
            'data'           => $order,
            'cargoCompanies' => $cargoCompanies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $orderId, CreateOrderResultRequest $request)
    {
        $order = Order::where([
            'company_id' => Auth::user()->company->id,
            'status'     => Order::STATUS_PAID,
        ])->find($orderId);

        $data = [
            'order_id'         => $orderId,
            'cargo_company_id' => $request->cargo_company_id,
            'shipping_no'      => $request->shipping_no,
            'note'             => $request->note,
        ];

        try {
            OrderResult::create($data);

            $order->update(['status' => Order::STATUS_SHIPPED]);

            if ($order->type === Product::TYPE_DIGITAL)
                $this->mailService->sendDigitalShippedOrder($order);
            else
                $this->mailService->sendShippedOrder($order);

            return redirect()->route('user.order.show', [$orderId]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function show(int $orderId)
    {
        $order = Order::with('products', 'payment', 'result')
            ->where('company_id', Auth::user()->company->id)->findOrFail($orderId);

        dd($order->created_at);

        return Inertia::render('User/Order/Show', [
            'data' => $order,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelOrder(Request $request, $id)
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
