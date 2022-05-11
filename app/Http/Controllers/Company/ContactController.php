<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\UserContactRequest;
use App\Models\Company;
use App\Models\Contact;
use App\Models\UserContact;
use Illuminate\Http\Request;
use App\View\Components\Shop\Header;

class ContactController extends Controller
{
    public $company;

    public function __construct(Header $header)
    {
        $this->company = $header->company;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.company.contact.index', [
            'company' => $this->company,
        ]);
    }


    public function send(UserContactRequest $request)
    {
        $data = [
            'name'       => $request->name,
            'company_id' => $request->company_id,
            'email'      => $request->email,
            'text'       => $request->text,
            'message'    => $request->message,
        ];

        try {
            UserContact::create($data);

            $request->session()->flash('type', 'success');
            return redirect()->back()->with('toast_success', __('Bilgi talebiniz başarıyla iletildi en kısa süre içinde iletişime geçmiş olacağız!'));
        } catch (\Exception $e) {

            $request->session()->flash('type', 'error');
            return redirect()->back()->with('toast_error', __('Lütfen gerekli alanları istenilene göre doldurmayı unutmayınız!'));

        }

    }
}
