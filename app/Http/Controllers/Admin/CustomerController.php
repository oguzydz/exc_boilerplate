<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerSearchRequest;
use App\Http\Requests\PasiveRequest;
use App\Models\User;
use App\Models\UserCancel;
use App\Models\UserPasive;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Customer/Index', [
            'statuses' => User::$statuses
        ]);
    }

    /**
     * List the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(int $statusId, CustomerSearchRequest $request)
    {
        $customersList = User::where('status', $statusId)
            ->whereHas("roles", function ($role) {
                $role->where("name", "user");
            })
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->select(['id', 'name', 'email', 'status', 'created_at'])
            ->paginate(10);

        return Inertia::render('Admin/Customer/List/Index', [
            'data'     => $customersList,
            'status'   => User::$statuses[$statusId],
            'statusId' => $statusId,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $userId)
    {
        $data        = User::with(['iban', 'confirmData', 'company', 'type', 'city', 'county'])->findOrFail($userId);
        $userCancel  = UserCancel::where('user_id', $userId)->first();
        $userPasive  = UserPasive::where('user_id', $userId)->first();

        return Inertia::render('Admin/Customer/List/Show', [
            'data'        => $data,
            'userCancel'  => $userCancel,
            'userPasive'  => $userPasive
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function pasive(int $userId)
    {
        $user = User::findOrFail($userId);

        return Inertia::render('Admin/Customer/Pasive', [
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function pasiveStore(PasiveRequest $request, int $userId)
    {
        $user = User::findOrFail($userId);

        $data = [
            'user_id' => $userId,
            'text'    => $request->text,
        ];

        try {
            $user->update([
                'status' => User::STATUS_PASIVE
            ]);

            UserPasive::create($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Kullanıcı güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request, int $userId)
    {
        $user = User::findOrFail($userId);

        try {
            $user->update([
                'status' => User::STATUS_ACTIVE
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Kullanıcı güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
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
