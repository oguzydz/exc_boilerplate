<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\EditOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderResult;
use App\Models\Payment;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $status
     * @return \Illuminate\Http\Response
     */
    public function index(int $status = 0)
    {
        $orders = Order::where('status', $status)->with('user')->orderBy('created_at')->paginate(10);

        return Inertia::render('Admin/Order/Index', [
            'data' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return Inertia::render('Admin/Order/Create', [
            'categories' => $categories,
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
            $image_seo = Str::slug($request->image_seo, '-');
            $slug = Str::slug($request->slug, '-') . '--' . Order::getNextId();
            $getFile = $request->file()['image'];

            $fileName = $image_seo . '--' . time() . '.' . $getFile->getClientOriginalExtension();
            $filePath = $getFile->storeAs('urunler', $fileName, 'public');

            $data = [
                'title' => $request->title,
                'text' => $request->text,
                'slug' => $slug,
                'image' => $filePath,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'delivery_time' => $request->delivery_time,
                'image_seo' => $image_seo,
                'category_id' => $request->category_id,
                'order' => $request->order,
                'status' => $request->status
            ];

            Order::create($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Ürün eklenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Payment $payment, $id)
    {
        $order = $order->where('id', $id)->with(['user', 'product'])->first();
        $payment = $order->payment($order->user_id)->first();

        if ($order !== null) {
            return Inertia::render('Admin/Order/Show', [
                'data' => $order,
                'payment' => $payment,
            ]);
        }

        return redirect(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $order = Order::findOrFail($id);
        $statusList = $order->statusList();

        $data = [
            'id' => $order->id,
            'text' => $order->text,
            'user_id' => $order->user_id,
            'status' => $order->status,
        ];

        return Inertia::render('Admin/Order/Edit', [
            'data' => $data,
            'statusList' => $statusList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $order = Order::findOrFail($request->id);

            $data = [
                'status' => $request->status
            ];

            $order->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message',__('Ürün güncellenirken beklenmedik bir hata oldu'));
            dd($e);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function completeView(int $id)
    {
        $order = Order::findOrFail($id);
        $orderResult = $order->result()->count() ? $order->result : false;

        $data = [
            'id' => $order->id,
            'text' => $order->text,
            'user_id' => $order->user_id,
            'status' => $order->status,
        ];

        return Inertia::render('Admin/Order/Complete', [
            'data' => $data,
            'orderResult' => $orderResult,
        ]);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        $data = [
            'order_id' => $request->order_id,
            'file_link' => $request->file_link,
            'text' => $request->text,
        ];

        $order = Order::findOrFail($request->order_id);
        $orderResult = $order->result();

        try {
            if($orderResult->count()) {
                $orderResult->update($data);
            } else {
                OrderResult::create($data);
            }

            $order->update([
                'status' => $order::STATUS_COMPLETED
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message',__('Ürün güncellenirken beklenmedik bir hata oldu'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $getImage = Order::findOrFail($id)->image;

        try {
            Storage::disk('public')->delete($getImage);
            Order::destroy($id);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message',__('Ürün silinirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
