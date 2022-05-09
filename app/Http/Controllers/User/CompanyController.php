<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('user_id', Auth::user()->id)->first();

        return Inertia::render('User/Company/Index', [
            'data' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request)
    {
        $userCompany = Company::where('user_id', Auth::user()->id)->firstOrFail();
        $slug        = Str::slug($request->title, '-');
        $logo        = isset($request->file()['logo']) ? $request->file()['logo'] : false;
        $bgImage     = isset($request->file()['bg_image']) ? $request->file()['bg_image'] : false;

        $companyData = [
            'title'     => $request->title,
            'text'      => $request->text,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'instagram' => $request->instagram,
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'slug'  => Str::slug($request->title, '-'),
        ];

        if($logo) {
            $logoName = $slug . '-logo-' . time() . '.' . $logo->getClientOriginalExtension();
            $filePath = $logo->storeAs('logos', $logoName, 'public');

            $companyData['logo'] = $filePath;
        }

        if($bgImage) {
            $bgImageName = $slug . '-bg-image-' . time() . '.' . $bgImage->getClientOriginalExtension();
            $filePath    = $bgImage->storeAs('bgimages', $bgImageName, 'public');

            $companyData['bg_image'] = $filePath;
        }

        try {
            $userCompany->update($companyData);

            return redirect()->back()->withSuccess(['msg' => 'Başarıyla Kaydedildi.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
