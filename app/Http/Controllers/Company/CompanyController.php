<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\City;
use App\Models\Product;
use App\Services\IyzicoService;
use App\View\Components\Shop\Header;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public $company;
    protected $iyzicoService;

    public function __construct(Header $header, IyzicoService $iyzicoService)
    {
        $this->company = $header->company;
        $this->iyzicoService = $iyzicoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::where(['company_id' => $this->company->id, 'status' => Product::STATUS_ACTIVE])->paginate(20);

        return view('pages.company.index', [
            'products' => $products,
            'company'  => $this->company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        return view('pages.company.payment.checkout', [
            'company' => $this->company,
            'cities'  => City::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function threedsInitialize(PaymentRequest $request)
    {
        $threedsInitialize = $this->iyzicoService->payment($request, $this->company);

        if ($threedsInitialize->getStatus() == 'success') {
            return $this->iyzicoService->payment($request, $this->company)->getHtmlContent();
        }

        return redirect()->back()->withErrors([
            'message' => $threedsInitialize->getErrorMessage()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentResult(Request $request)
    {
        dd($request->all());
        return view('pages.company.payment.result', [
            'company' => $this->company,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, string $slug)
    {
        $product         = $this->company->product($slug)->firstOrFail();
        $relatedProducts = $product->category->relatedProducts($product->id)->limit(3)->get();

        return view('pages.company.show', [
            'product'         => $product,
            'relatedProducts' => $relatedProducts,
            'companySlug'     => $request->route()->action['slug'],
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
