<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCargoRequest;
use App\Models\Company;
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
        $company      = Company::where('user_id', Auth::user()->id)->first();
        $cargoSetting = CompanyCargoSetting::where('company_id', $company->id)->first();

        return Inertia::render('User/Cargo/Index', [
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
            $cargoSetting = CompanyCargoSetting::find($request->id);

            $data = [
                'price'            => $request->price,
                'after_free_price' => $request->after_free_price,
            ];

            $update = $cargoSetting->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Kargo ayarları güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
