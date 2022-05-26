<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductGalleryRequest;
use App\Http\Requests\EditProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductGalleryController extends Controller
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
    public function index(int $id)
    {
        $product = Product::where([
            'id' => $id,
            'company_id' => Auth::user()->company->id

        ])->firstOrFail();
        $galleries = $product->gallery()->paginate(10);

        return Inertia::render('User/Product/Gallery/Index', [
            'data'    => $galleries,
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
        Product::where([
            'id'         => $productId,
            'company_id' => Auth::user()->company->id
        ])->firstOrFail();

        return Inertia::render(
            'User/Product/Gallery/Create',
            [
                'productId' => $productId
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductGalleryRequest $request, int $productId)
    {
        try {
            $getFile  = $request->file()['image'];
            $fileName = $productId . '--' . time() . '.' . $getFile->getClientOriginalExtension();
            $filePath = $getFile->storeAs('product-gallery', $fileName, 'public');

            $data = [
                'product_id' => $productId,
                'image'      => $filePath,
                'order'      => $request->order,
            ];

            ProductGallery::create($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Veri eklenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(int $productId, int $galleryId)
    {
        Product::where([
            'id'         => $productId,
            'company_id' => Auth::user()->company->id
        ])->firstOrFail();

        $productGallery = ProductGallery::findOrFail($galleryId);
        $data = [
            'id'         => $productGallery->id,
            'product_id' => $productGallery->product_id,
            'image'      => $productGallery->image,
            'order'      => $productGallery->order,
            'new_image',
        ];

        return Inertia::render(
            'User/Product/Gallery/Edit',
            [
                'data'       => $data,
                'productId'  => $productId,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductGalleryRequest $request)
    {
        try {
            $productGallery = ProductGallery::findorFail($request->id);
            $newImage       = isset($request->file()['new_image']) ? $request->file()['new_image'] : false;

            $data = [
                'order' => $request->order,
            ];

            if($newImage) {
                $newImageName = $productGallery->id . '-product-image-' . time() . '.' . $newImage->getClientOriginalExtension();
                $filePath     = $newImage->storeAs('product-images', $newImageName, 'public');

                $data['image'] = $filePath;
            }

            $productGallery->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Resim güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $productId, int $galleryId)
    {
        $getImage = ProductGallery::findOrFail($galleryId)->image;

        try {
            Storage::disk('public')->delete($getImage);
            ProductGallery::destroy($galleryId);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Resim silinirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
