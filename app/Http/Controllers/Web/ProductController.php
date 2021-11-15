<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        return view('pages.product.index', [
            'categories' => $categories
        ]);
    }

    public function show(Request $request)
    {
        $productSlug = $request->route()->action['productSlug'];
        $product = Product::where('slug', $productSlug)->with(['category', 'features'])->firstOrFail();
        $relatedProducts = $product->category->relatedProducts($product->id)->limit(3)->get();

        return view('pages.product.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
