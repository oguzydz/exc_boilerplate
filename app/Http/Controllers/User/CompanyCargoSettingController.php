<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCargoRequest;
use App\Models\CompanyCargoSetting;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CompanyCargoSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargoSetting = CompanyCargoSetting::where('company_id', Auth::user()->company->id)->firstOrFail();

        return Inertia::render('User/CargoSetting/Index', [
            'data' => $cargoSetting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyCargoRequest $request)
    {
        try {
            $cargoSetting = CompanyCargoSetting::where('company_id', Auth::user()->company->id)->firstOrFail();

            $data = [
                'price'            => $request->price,
                'after_free_price' => $request->after_free_price,
            ];

            $cargoSetting->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Kargo ayarları güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
