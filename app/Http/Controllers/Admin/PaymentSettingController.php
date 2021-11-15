<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\EditPaymentSettingRequest;

class PaymentSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentSetting = PaymentSetting::first();
        
        return Inertia::render('Admin/PaymentSetting', [
            'paymentSetting' => $paymentSetting
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentSetting  $paymentSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentSetting $paymentSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentSetting  $paymentSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentSetting $paymentSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentSetting  $paymentSetting
     * @return \Illuminate\Http\Response
     */
    public function update(EditPaymentSettingRequest $request, PaymentSetting $paymentSetting)
    {
        try {
            $paymentSetting = PaymentSetting::first();
            $paymentSetting->update($request->all());
            
            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Ödeme bilgileri güncellenirken beklenmedik bir hata oldu!'));

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentSetting  $paymentSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentSetting $paymentSetting)
    {
        //
    }
}
