<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UserContactSearchRequest;
use App\Models\CommissionFee;
use App\Models\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $commission = CommissionFee::where(function ($query) use ($request) {
                $query->where('price', 'like', "%$request->search%");
            })->paginate(10);

        return Inertia::render('User/Commission/Index', [
            'data' => $commission,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $contactId
     * @return \Illuminate\Http\Response
     */
    public function show(int $commissionId)
    {
        $commission = CommissionFee::findOrFail($commissionId);

        return Inertia::render('User/Commission/Show', [
            'data' => $commission,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserContact  $contactId
     * @return \Illuminate\Http\Response
     */
    public function destroy($commissionId, Request $request)
    {

        try {
            CommissionFee::destroy($commissionId);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Komisyon silerken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
