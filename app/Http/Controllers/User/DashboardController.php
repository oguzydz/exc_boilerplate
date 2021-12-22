<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserConfirmRequest;
use App\Models\City;
use App\Models\User;
use App\Models\UserConfirmData;
use App\Models\UserIban;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes = UserType::all();
        $userStatus = Auth::user()->status;
        $cities = City::all();

        return Inertia::render('User/Dashboard', [
            'userTypes' => $userTypes,
            'cities' => $cities,
            'userStatus' => $userStatus,
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
    public function store(UserConfirmRequest $request)
    {
        $userId = Auth::user()->id;

        $userData = [
            'membership_type' => $request->membership_type,
            'name' => $request->name,
            'tc' => $request->tc,
            'born_date' => Carbon::parse($request->born_date),
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'county_id' => $request->county_id,
            'status' => User::STATUS_READY,
        ];

        $userIbanData = [
            'user_id' => $userId,
            'iban' => $request->iban,
        ];

        $userConfirmData = [
            'user_id' => $userId,
            'service_text' => $request->service_text,
        ];

        try {
            $user = User::findOrFail($userId);
            $user->update($userData);

            UserIban::create($userIbanData);
            UserConfirmData::create($userConfirmData);

            return redirect()->back()->withSuccess(['msg' => 'The Messagex']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
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
