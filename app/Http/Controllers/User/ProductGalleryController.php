<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        $product = Product::where(['id' => $id, 'company_id' => $this->userService->getUserCompany(Auth::user()->id)->id])->first();
        $galleries = $product->gallery()->paginate(10);

        return Inertia::render('User/Product/Gallery/Index', [
            'data' => $galleries,
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
        Product::where(['id' => $productId, 'company_id' => $this->userService->getUserCompany(Auth::user()->id)->id])->firstOrFail();

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
    public function store(Request $request, int $productId)
    {
        try {
            $getFile = $request->file()['image'];
            $fileName = $productId . '--' . time() . '.' . $getFile->getClientOriginalExtension();
            $filePath = $getFile->storeAs('product-gallery', $fileName, 'public');

            $data = [
                'product_id' => $productId,
                'image' => $filePath,
                'order' => $request->order,
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
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGallery $productGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($productId, $galleryId)
    {
        try {
            $data = ProductGallery::find($galleryId);

            return Inertia::render(
                'Admin/Product/Gallery/Edit',
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
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $productGalleryDetail = ProductGallery::find($request->id);

            $data = [
                'image_seo' => $request->image_seo,
                'order' => $request->order,
            ];

            if (isset($request->file()['new_image'])) {
                $image_seo = Str::slug($request->image_seo, '-');

                $getFile = $request->file()['new_image'];
                $fileName = $image_seo . '--' . time() . '.' . $getFile->getClientOriginalExtension();
                $filePath = $getFile->storeAs('urunler', $fileName, 'public');

                $data['image'] = $filePath;
            }

            $productGalleryDetail->update($data);

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
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId, $galleryID, Request $request)
    {
        $getImage = ProductGallery::find($galleryID)->image;

        try {
            Storage::disk('public')->delete($getImage);
            ProductGallery::destroy($galleryID);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request
                ->session()
                ->flash(
                    'message',
                    __('Özellik silinirken beklenmedik bir hata oldu!')
                );

            return redirect()->back();
        }
    }
}
