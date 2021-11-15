<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePaymentRequest;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('user_id', Auth::user()->id)->get();

        return Inertia::render('User/Payment/Index')->with(compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePaymentRequest $request)
    {
        try {
            $order = Order::findOrFail($request->order_id);
            $payment = $order->payment(Auth::user()->id)->first();

            if($request->type === 'papara') {
                $data = [
                    'papara_account_name' => $request->name,
                    'papara_payment_date' => $request->date,
                ];
            } else if($request->type === 'bank') {
                $data = [
                    'bank_account_number' => $request->number,
                    'bank_payment_date' => $request->date,
                ];
            } else if($request->type === 'bitcoin') {
                $data = [
                    'bitcoin_wallet_address' => $request->wallet,
                    'bitcoin_payment_date' => $request->date,
                ];
            } else {
                return redirect()->back()->withErrors([
                    'payment' => 'Bu ödeme türü şuanlık sistemlerimizde aktif değildir!',
                ]);
            }

            $data['order_id'] = $order->id;
            $data['user_id'] = auth()->user()->id;

            if($payment) {
                $payment->update($data);
            } else {
                $payment = Payment::create($data);
            }

            if($payment) {
                $order->status = Order::STATUS_PAID;
                $order->save();
            }

            $request->session()->put('flash', [
                'message' => 'Ödeme bildirimiz tarafımıza ulaşmıştır en kısa sürede siparişinizi işleme alınacaktır!',
                'payment' => $payment->id,
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'payment' => 'Ödeme bildiriminiz eklenirken sorun oluşmuştur, lütfen daha sonra tekrar deneyiniz veya bizimle iletişime geçiniz!',
                ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
