<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductFeature;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $product = Product::findorFail($id);
        $features = Product::find($id)->features()->paginate(10);

        return Inertia::render('Admin/Product/Feature/Index', [
            'data' => $features,
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $productId)
    {
        return Inertia::render(
            'Admin/Product/Feature/Create',
            [
                'id' => $productId
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $productId)
    {
        try {
            $data = [
                'product_id' => $productId,
                'title' => $request->title,
                'text' => $request->text,
                'order' => $request->order,
            ];

            ProductFeature::create($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Veri eklenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function show(ProductFeature $productFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function edit($productId, $featureId)
    {
        try {
            $data = ProductFeature::find($featureId);

            return Inertia::render(
                'Admin/Product/Feature/Edit',
                [
                    'data' => $data,
                ]
            );
        } catch (\Exception $e) {
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductFeature $productFeature)
    {
        try {
            $productFeature = ProductFeature::find($request->id);

            $data = [
                'id' => $request->id,
                'title' => $request->title,
                'text' => $request->text,
                'order' => $request->order,
            ];

            $productFeature->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Duyuru eklenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductFeature  $productFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId, $featureId, Request $request)
    {
        try {
            ProductFeature::destroy($featureId);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request
                ->session()
                ->flash(
                    'message',
                    __('Silinirken beklenmedik bir hata oldu!')
                );

            return redirect()->back();
        }
    }
}
