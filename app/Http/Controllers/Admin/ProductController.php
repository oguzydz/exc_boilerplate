<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('order')->paginate(5);

        return Inertia::render('Admin/Product/Index', [
            'data' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return Inertia::render('Admin/Product/Create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        try {
            $image_seo = Str::slug($request->image_seo, '-');
            $slug = Str::slug($request->slug, '-') . '--' . Product::getNextId();
            $getFile = $request->file()['image'];

            $fileName = $image_seo . '--' . time() . '.' . $getFile->getClientOriginalExtension();
            $filePath = $getFile->storeAs('urunler', $fileName, 'public');

            $data = [
                'title' => $request->title,
                'text' => $request->text,
                'slug' => $slug,
                'image' => $filePath,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'best_seller' => $request->best_seller,
                'delivery_time' => $request->delivery_time,
                'image_seo' => $image_seo,
                'category_id' => $request->category_id,
                'order' => $request->order,
                'status' => $request->status
            ];

            Product::create($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Ürün eklenirken beklenmedik bir hata oldu'));

            dd($e);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        $data = [
            'id' => $product->id,
            'title' => $product->title,
            'text' => $product->text,
            'image' => $product->image,
            'price' => $product->price,
            'discount_price' => $product->discount_price,
            'best_seller' => $product->best_seller,
            'image_seo' => $product->image_seo,
            'category_id' => $product->category_id,
            'order' => $product->order,
            'delivery_time' => $product->delivery_time,
            'status' => $product->status,
            'slug' => $product->slug,
            'new_image',
        ];

        return Inertia::render('Admin/Product/Edit', [
            'data' => $data,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request)
    {
        try {
            $product = Product::find($request->id);
            $slug = Str::slug($request->slug, '-') . '--' . $product->id;

            $data = [
                'id' => $request->id,
                'title' => $request->title,
                'text' => $request->text,
                'price' => $request->price,
                'slug' => $slug,
                'discount_price' => $request->discount_price,
                'best_seller' => $request->best_seller,
                'image_seo' => $request->image_seo,
                'category_id' => $request->category_id,
                'order' => $request->order,
                'delivery_time' => $request->delivery_time,
                'status' => $request->status
            ];
            if (isset($request->file()['new_image'])) {
                $image_seo = Str::slug($request->image_seo, '-');

                $getFile = $request->file()['new_image'];
                $fileName = $image_seo . '--' . time() . '.' . $getFile->getClientOriginalExtension();
                $filePath = $getFile->storeAs('urunler', $fileName, 'public');

                $data['image'] = $filePath;
            }

            $update = $product->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message',__('Ürün güncellenirken beklenmedik bir hata oldu'));
            dd($e);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $getImage = Product::findOrFail($id)->image;

        try {
            Storage::disk('public')->delete($getImage);
            Product::destroy($id);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message',__('Ürün silinirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
