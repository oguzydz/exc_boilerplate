<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $contacts = Contact::where(function ($query) use ($request) {
            $query->where('name', 'like', "%$request->search%");
        })
            ->paginate(10);

        return Inertia::render('Admin/Contact/Index', [
            'data' => $contacts,
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
        $contact = Contact::findOrFail($contactId);

        return Inertia::render('Admin/Contact/Show', [
            'data' => $contact,
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
            Contact::destroy($contactId);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('İletişim mesajını silerken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

}
