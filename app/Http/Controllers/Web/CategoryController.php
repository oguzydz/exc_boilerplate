<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\View\Components\Shop\Header;
use Gloudemans\Shoppingcart\Facades\Cart;

class CategoryController extends Controller
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
        $categories = Category::where(['company_id' => $this->company->id, 'status' => Category::STATUS_ACTIVE])->paginate(20);

        return view('pages.company.category.index', [
            'categories' => $categories,
            'company' => $this->company,
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
     * @param  string $categorySlug
     * @return \Illuminate\Http\Response
     */
    public function show(string $categorySlug, Request $request)
    {
        dd(Cart::content());
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $categoryProducts = $category->products()->paginate(10);

        return view('pages.company.category.show', [
            'category' => $category,
            'categoryProducts' => $categoryProducts,
            'company' => $this->company,
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
