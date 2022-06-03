<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserConfirmRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyCargoSetting;
use App\Models\User;
use App\Models\UserCancel;
use App\Models\UserConfirmData;
use App\Models\UserIban;
use App\Models\UserPasive;
use App\Models\UserType;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes  = UserType::all();
        $userStatus = Auth::user()->status;
        $cities     = City::all();

        $userConfirm = UserConfirmData::where('user_id', Auth::user()->id)->select(['service_text'])->first() ?? (object) [];
        $userCancel  = UserCancel::where('user_id', Auth::user()->id)->latest()->first();
        $userIban    = UserIban::where('user_id', Auth::user()->id)->select(['iban'])->first();
        $company     = Company::where('user_id', Auth::user()->id)->select([
            'title', 'text', 'corporate_name as cn', 'tax_office as to', 'taxpayer_identification_number as tin'
        ])->first() ?? (object) [];

        if ($userIban) {
            $userIban->corporate_name                 = $company->cn;
            $userIban->tax_office                     = $company->to;
            $userIban->taxpayer_identification_number = $company->tin;
        } else {
            $userIban = (object) [];
        }

        return Inertia::render('User/Confirmation', [
            'userTypes'  => $userTypes,
            'cities'     => $cities,
            'userStatus' => $userStatus,
            'firstForm'  => Auth::user(),
            'secondForm' => $userIban,
            'thirdForm'  => $userConfirm,
            'fourthForm' => $company,
            'userCancel' => $userCancel,
        ]);
    }

    public function other()
    {
        $userPasive  = UserPasive::where('user_id', Auth::user()->id)->first();

        return Inertia::render('User/Other', [
            'userPasive' => $userPasive,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserConfirmRequest $request)
    {
        $userData = [
            'membership_type' => $request->membership_type,
            'name'            => $request->name,
            'tc'              => $request->tc,
            'born_date'       => Carbon::parse($request->born_date),
            'phone'           => $request->phone,
            'address'         => $request->address,
            'city_id'         => $request->city_id,
            'county_id'       => $request->county_id,
            'status'          => User::STATUS_READY,
        ];

        $userIbanData = [
            'user_id' => Auth::user()->id,
            'iban'    => $request->iban,
        ];

        $userConfirmData = [
            'user_id'      => Auth::user()->id,
            'service_text' => $request->service_text,
        ];

        $companyData = [
            'user_id'  => Auth::user()->id,
            'title'    => $request->title,
            'text'     => $request->text,
            'logo'     => Company::EXAMPLE_LOGO_URL,
            'bg_image' => Company::EXAMPLE_BG_URL,
            'email'    => Auth::user()->email,
            'phone'    => $request->phone,
            'slug'     => Str::slug($request->title, '-'),
        ];

        if (
            $request->membership_type    === Company::PRIVATE_SUB_MERCHANT_TYPE
            || $request->membership_type === Company::LIMITED_COMPANY_SUB_MERCHANT_TYPE
        ) {
            $companyData += [
                'corporate_name'                 => $request->corporate_name,
                'tax_office'                     => $request->tax_office,
                'taxpayer_identification_number' => $request->taxpayer_identification_number,
            ];
        }

        try {
            $user = User::findOrFail(Auth::user()->id);
            $user->update($userData);

            $userIban    = UserIban::where('user_id', Auth::user()->id)->first();
            $userConfirm = UserConfirmData::where('user_id', Auth::user()->id)->first();
            $company     = Company::where('user_id', Auth::user()->id)->first();

            $userIban    ? $userIban->update($userIbanData)       : UserIban::create($userIbanData);
            $userConfirm ? $userConfirm->update($userConfirmData) : UserConfirmData::create($userConfirmData);
            $company     ? $company->update($companyData)         : $company = Company::create($companyData);

            $userCargoSetting = CompanyCargoSetting::where('company_id', $company->id)->exists();

            if (!$userCargoSetting) {
                CompanyCargoSetting::create(
                    [
                        'company_id'       => $company->id,
                        'price'            => CompanyCargoSetting::DEFAULT_PRICE,
                        'after_free_price' => CompanyCargoSetting::DEFAULT_AFTER_FREE_PRICE,
                    ]
                );
            }

            return redirect()->back()->withSuccess(['msg' => 'Başarıyla Kaydedildi.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
