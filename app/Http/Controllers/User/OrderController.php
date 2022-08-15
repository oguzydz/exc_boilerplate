<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Order;
use App\Models\OrderCancel;
use App\Models\Payment;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $orderId)
    {
        $order = Order::where('company_id', Auth::user()->company->id)->findOrFail($orderId);

        return Inertia::render('User/Order/Create', [
            'data' => $order
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function show(int $orderId)
    {
        $order = Order::with('products', 'payment')->where('company_id', Auth::user()->company->id)->findOrFail($orderId);

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
