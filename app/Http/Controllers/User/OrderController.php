<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\OrderCancel;
use App\Models\Payment;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('product')
            ->where('user_id', auth()->user()->id)
            ->paginate(5);

        return Inertia::render('User/Order/Index', [
            'data' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = Product::where('slug', $request->product)
            ->with('category')
            ->firstOrFail();

        return Inertia::render('User/Order/Create', [
            'product' => $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        try {
            $product = Product::findOrFail($request->product);

            $data = [
                'text' => $request->text,
                'product_id' => $product->id,
                'user_id' => auth()->user()->id,
                'status' => Order::STATUS_GIVEN,
            ];

            $order = Order::create($data);

            $request->session()->put('flash', [
                'message' => 'Sipariş eklendi!',
                'order' => $order->id,
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'product' => 'Sipariş eklenirken beklenmedik bir hata oldu',
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $order)
    {
        $order = Order::with('product')->where('user_id', Auth::user()->id)->findOrFail($order);
        $paymentSettings = PaymentSetting::first();
        $payment = [];
        $orderResult = [];

        if ($order->status === Order::STATUS_PAID) {
            $payment = Payment::where([
                'order_id' => $order->id,
                'user_id' => auth()->user()->id,
            ])->first();
        }

        if ($order->status === Order::STATUS_COMPLETED) {
            $orderResult = $order->result;
        }

        return Inertia::render('User/Order/Show', [
            'order' => $order,
            'user' => auth()->user(),
            'paymentSettings' => $paymentSettings,
            'payment' => $payment,
            'orderResult' => $orderResult,
            'role' => $request->role ?? null,
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
        try {
            $order = Order::findOrFail($id);

            if ($request->role === 'restart') {
                $data = [
                    'status' => Order::STATUS_GIVEN,
                ];
            } else {
                $data = [
                    'text' => $request->text,
                ];
            }

            $order->update($data);

            $request->session()->put('flash', [
                'message' => 'Sipariş Güncellendi!',
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'product' =>
                    'Sipariş güncellenirken beklenmedik bir hata oldu',
                ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sentPayment(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        try {
            $order = Order::findOrFail($id);

            $data = [
                'text' => $request->text,
            ];

            $order->update($data);

            $request->session()->put('flash', [
                'message' => 'Sipariş Güncellendi!',
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'product' =>
                    'Sipariş güncellenirken beklenmedik bir hata oldu',
                ]);
        }
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
        try {
            $order = Order::findOrFail($id);

            $data = [
                'order_id' => $order->id,
                'message' => $request->orderCancelMessage,
                'status' => '',
            ];

            if (count($request->cancelOrderStatusMessages) > 0) {
                foreach ($request->cancelOrderStatusMessages
                    as $index => $status) {
                    if ($status['checked'] === true) {
                        if (
                            count($request->cancelOrderStatusMessages) !==
                            $index + 1
                        ) {
                            $data['status'] .= $status['message'] . ',';
                        } else {
                            $data['status'] .= $status['message'];
                        }
                    }
                }
            }
            $orderCancel = OrderCancel::create($data);

            if ($orderCancel) {
                $order->status = Order::STATUS_CANCELED;
                $order->save();
            }

            $request->session()->put('flash', [
                'message' => 'Sipariş İptal Edildi!',
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'order' =>
                    'Sipariş iptal edilirken beklenmedik bir hata oldu',
                ]);
        }
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
