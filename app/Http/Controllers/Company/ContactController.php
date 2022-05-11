<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
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


    public function send(Request $request)
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

    public function user_send(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
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
