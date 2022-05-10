<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contact');
    }


    public function send(ContactRequest $request)
    {
        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'text'    => $request->text,
            'message' => $request->message,
        ];

        try {
            Contact::create($data);

            $request->session()->flash('type', 'success');
            return redirect()->back()->with('toast_success', __('Bilgi talebiniz başarıyla iletildi en kısa süre içinde iletişime geçmiş olacağız!'));
        } catch (\Exception $e) {

            $request->session()->flash('type', 'error');
            return redirect()->back()->with('toast_error', __('Lütfen gerekli alanları istenilene göre doldurmayı unutmayınız!'));

        }
    }
}
