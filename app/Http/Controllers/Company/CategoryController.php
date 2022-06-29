<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopFilterRequest;
use App\Models\Category;
use App\Models\Product;
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
    public function show(string $categorySlug, ShopFilterRequest $request)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        $products = Product::where([
            'company_id'  => $this->company->id,
            'category_id' => $category->id,
            'status'      => Product::STATUS_ACTIVE
        ])
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', "%$request->search%");
            })
            ->when($request->minAmount || $request->maxAmount, function ($query) use ($request) {
                $query->whereBetween('price', [$request->minAmount, $request->maxAmount]);
            })
            ->when(array_key_exists($request->orderBy, Product::FILTER_ORDER_BY_LIST), function ($query) use ($request) {
                $query->orderBy(Product::FILTER_ORDER_BY_LIST[$request->orderBy][0], Product::FILTER_ORDER_BY_LIST[$request->orderBy][1]);
            })
            ->paginate(20);


        return view('pages.company.category.show', [
            'category'         => $category,
            'categoryProducts' => $products,
            'company'          => $this->company,
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
