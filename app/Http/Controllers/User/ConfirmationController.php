<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserConfirmRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\User;
use App\Models\UserCancel;
use App\Models\UserConfirmData;
use App\Models\UserIban;
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
        $userId     = Auth::user()->id;
        $userTypes  = UserType::all();
        $userStatus = Auth::user()->status;
        $cities     = City::all();

        $userIban    = UserIban::where('user_id', $userId)->select(['iban'])->first() ?? (object) [];
        $userConfirm = UserConfirmData::where('user_id', $userId)->select(['service_text'])->first() ?? (object) [];
        $company     = Company::where('user_id', $userId)->select(['title', 'text'])->first() ?? (object) [];
        $userCancel  = UserCancel::where('user_id', $userId)->first();

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

        try {
            $user = User::findOrFail(Auth::user()->id);
            $user->update($userData);

            $userIban    = UserIban::where('user_id', Auth::user()->id)->first();
            $userConfirm = UserConfirmData::where('user_id', Auth::user()->id)->first();
            $company     = Company::where('user_id', Auth::user()->id)->first();

            $userIban    ? $userIban->update($userIbanData) : UserIban::create($userIbanData);
            $userConfirm ? $userConfirm->update($userConfirmData) : UserConfirmData::create($userConfirmData);
            $company     ? $company->update($companyData) : Company::create($companyData);

            return redirect()->back()->withSuccess(['msg' => 'Başarıyla Kaydedildi.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
