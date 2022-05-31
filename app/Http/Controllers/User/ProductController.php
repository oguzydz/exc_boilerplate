<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductSearchRequest;
use App\Models\Product;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductSearchRequest $request)
    {
        $products = Product::where([
            'company_id' => Auth::user()->company->id,
            'status'     => Product::STATUS_ACTIVE
        ])
            ->where(function ($query) use ($request) {
                $query->where('title', 'like', "%$request->search%");
            })
            ->paginate(10);

        return Inertia::render('User/Product/Index', [
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
        return Inertia::render('User/Product/Create', [
            'categories' => Auth::user()->company->activeCategories
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
        $slug = Str::slug($request->title, '-') . '--' . Product::getNextId();

        $getFile  = $request->file()['image'];
        $fileName = $slug . '--' . Auth::user()->company->id . '.' . $getFile->getClientOriginalExtension();
        $filePath = $getFile->storeAs('product-images', $fileName, 'public');

        $data = [
            'company_id'     => Auth::user()->company->id,
            'category_id'    => $request->category_id,
            'title'          => $request->title,
            'text'           => $request->text,
            'price'          => $request->price,
            'discount_price' => $request->discount_price,
            'stock'          => $request->stock,
            'delivery_time'  => $request->delivery_time,
            'slug'           => $slug,
            'image'          => $filePath,
            'order'          => $request->order,
            'status'         => Product::STATUS_ACTIVE
        ];

        try {
            Product::create($data);

            return redirect()->back()->withSuccess(['msg' => 'Başarıyla Kaydedildi.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where(['company_id' => Auth::user()->company->id, 'id' => $id])->firstOrFail();

        $data = [
            'id'             => $product->id,
            'category_id'    => $product->category_id,
            'title'          => $product->title,
            'text'           => $product->text,
            'price'          => $product->price,
            'discount_price' => $product->discount_price,
            'stock'          => $product->stock,
            'delivery_time'  => $product->delivery_time,
            'image'          => $product->image,
            'order'          => $product->order,
            'status'         => $product->status,
            'new_image',
        ];

        return Inertia::render('User/Product/Edit', [
            'data'       => $data,
            'categories' => Auth::user()->company->activeCategories,
            'statusList' => Product::STATUS_LIST,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request)
    {
        try {
            $product  = Product::findorFail($request->id);
            $slug     = Str::slug($request->title, '-') . '--' . $request->id;
            $newImage = isset($request->file()['new_image']) ? $request->file()['new_image'] : false;

            $data = [
                'id'             => $request->id,
                'category_id'    => $request->category_id,
                'title'          => $request->title,
                'text'           => $request->text,
                'price'          => $request->price,
                'discount_price' => $request->discount_price,
                'stock'          => $request->stock,
                'delivery_time'  => $request->delivery_time,
                'slug'           => $slug,
                'order'          => $request->order,
                'status'         => $request->status
            ];

            if ($newImage) {
                $newImageName = $slug . '-product-image-' . time() . '.' . $newImage->getClientOriginalExtension();
                $filePath     = $newImage->storeAs('product-images', $newImageName, 'public');

                $data['image'] = $filePath;
            }

            $product->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Ürün güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::where([
            'company_id' => Auth::user()->company->id,
            'id'         => $id
        ])->firstOrFail();

        try {
            $product->update([
                'status' => Product::STATUS_PASIVE
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Ürün pasife alınırken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
