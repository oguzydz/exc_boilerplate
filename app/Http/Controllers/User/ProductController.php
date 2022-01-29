<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\UserService;
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
    public function index()
    {
        $products = Product::where('company_id', $this->userService->getUserCompany(Auth::user()->id)->id)->paginate(10);

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
        $categories = Category::where('company_id', $this->userService->getUserCompany(Auth::user()->id)->id)->get();

        return Inertia::render('User/Product/Create', [
            'categories' => $categories
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
        $userCompanyId = $this->userService->getUserCompany(Auth::user()->id)->id;
        $slug = Str::slug($request->title, '-') . '--' . Product::getNextId();
        $getFile = $request->file()['image'];

        $fileName = $slug . '--' . $userCompanyId . '.' . $getFile->getClientOriginalExtension();
        $filePath = $getFile->storeAs('product-images', $fileName, 'public');

        $data = [
            'company_id' => $userCompanyId,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'text' => $request->text,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock,
            'delivery_time' => $request->delivery_time,
            'slug' => $slug,
            'image' => $filePath,
            'order' => $request->order,
            'status' => Product::STATUS_LIST['STATUS_ACTIVE']
        ];

        try {
            Product::create($data);

            return redirect()->back()->withSuccess(['msg' => 'Başarıyla Kaydedildi.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $categories = Category::where('company_id', $this->userService->getUserCompany(Auth::user()->id)->id)->get();
        $userCompanyId = $this->userService->getUserCompany(Auth::user()->id)->id;
        $product = Product::where(['company_id' => $userCompanyId, 'id' => $id])->firstOrFail();

        $data = [
            'id' => $product->id,
            'category_id' => $product->category_id,
            'title' => $product->title,
            'text' => $product->text,
            'price' => $product->price,
            'discount_price' => $product->discount_price,
            'stock' => $product->stock,
            'delivery_time' => $product->delivery_time,
            'image' => $product->image,
            'order' => $product->order,
            'status' => $product->status,
            'new_image',
        ];

        return Inertia::render('User/Product/Edit', [
            'data' => $data,
            'categories' => $categories,
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
            $product = Product::findorFail($request->id);
            $slug = Str::slug($request->title, '-') . '--' . $request->id;
            $newImage = isset($request->file()['new_image']) ? $request->file()['new_image'] : false;

            $data = [
                'id' => $request->id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'text' => $request->text,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'stock' => $request->stock,
                'delivery_time' => $request->delivery_time,
                'slug' => $slug,
                'order' => $request->order,
                'status' => $request->status
            ];

            if($newImage) {
                $newImageName = $slug . '-product-image-' . time() . '.' . $newImage->getClientOriginalExtension();
                $filePath = $newImage->storeAs('product-images', $newImageName, 'public');

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
    public function destroy($id)
    {
        //
    }
}
