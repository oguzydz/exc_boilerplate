<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCancel;
use App\Models\UserConfirmData;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewCostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('status', User::STATUS_READY)->select(['id', 'name', 'email', 'created_at', 'updated_at'])->paginate(5);

        return Inertia::render('Admin/NewCustomer/Index', [
            'data' => $customers
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::where('id', $id)->with(['iban', 'confirmData', 'type'])->firstOrFail();

        return Inertia::render('Admin/NewCustomer/Show', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->update([
                'status' => User::STATUS_ACTIVE
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message',__('Ürün güncellenirken beklenmedik bir hata oldu'));
            return redirect()->back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelShow(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        return Inertia::render('Admin/NewCustomer/Cancel', [
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelStore(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $data = [
            'user_id' => $id,
            'text' => $request->text,
        ];

        try {
            $user->update([
                'status' => User::STATUS_CANCELED
            ]);

            UserCancel::create($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message',__('Kullanıcı güncellenirken beklenmedik bir hata oldu'));
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
