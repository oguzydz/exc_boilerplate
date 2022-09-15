<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Order;
use App\Services\MailService;
use Inertia\Inertia;

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
     * @param int $status
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $orders = Order::where('status', Order::STATUS_PAID)
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')->paginate(10);

        return Inertia::render('Admin/Order/Index', [
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
        $orders = Order::with('result')->where('status', Order::STATUS_SHIPPED)
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orderBy('id', 'desc')->paginate(10);

        return Inertia::render('Admin/Order/Shipped', [
            'data' => $orders,
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
        $order = Order::with('products', 'payment', 'result')->findOrFail($orderId);

        return Inertia::render('Admin/Order/Show', [
            'data' => $order,
        ]);
    }
}
