<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
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
    public function list(int $statusId)
    {
        $customersList = User::where('status', $statusId)
            ->whereHas("roles", function($role) { $role->where("name", "user"); })
            ->select(['id', 'name', 'email', 'status', 'created_at'])
            ->paginate(10);

        return Inertia::render('Admin/Customer/List/Index', [
            'data'     => $customersList,
            'status'   => User::$statuses[$statusId]
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
        $data = User::with(['iban', 'confirmData', 'company', 'type', 'city', 'county'])->findOrFail($userId);

        return Inertia::render('Admin/Customer/List/Show', [
            'data' => $data
        ]);
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
