<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UserContactSearchRequest;
use App\Models\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $userContacts = UserContact::where([
            'company_id' => Auth::user()->company->id,
        ])
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->paginate(10);

        return Inertia::render('User/Contact/Index', [
            'data' => $userContacts,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $contactId
     * @return \Illuminate\Http\Response
     */
    public function show(int $contactId)
    {
        $userContacts = UserContact::where('company_id', Auth::user()->company->id)->findOrFail($contactId);

        return Inertia::render('User/Contact/Show', [
            'data' => $userContacts,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserContact  $contactId
     * @return \Illuminate\Http\Response
     */
    public function destroy($contactId, Request $request)
    {

        try {
            UserContact::destroy($contactId);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('İletişim mesajını silerken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
