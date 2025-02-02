<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Product;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $categories = Category::where([
            'status'     => Category::STATUS_ACTIVE,
            'company_id' => Auth::user()->company->id
        ])
            ->where(function ($query) use ($request) {
                $query->where('title', 'like', "%$request->search%");
            })
            ->paginate(10);

        return Inertia::render('User/Category/Index', [
            'data' => $categories,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pasive(SearchRequest $request)
    {
        $categories = Category::where([
            'status'     => Category::STATUS_PASIVE,
            'company_id' => Auth::user()->company->id
        ])
            ->where(function ($query) use ($request) {
                $query->where('title', 'like', "%$request->search%");
            })
            ->paginate(10);

        return Inertia::render('User/Category/Pasive', [
            'data' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('User/Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SearchRequest $request)
    {
        $slug    = Str::slug($request->title, '-');
        $isImage = isset($request->file()['image']) ? $request->file()['image'] : false;

        if ($isImage) {
            $getFile  = $request->file()['image'];
            $fileName = $slug . '--' . Auth::user()->company->id . '.' . $getFile->getClientOriginalExtension();
            $filePath = $getFile->storeAs('category-images', $fileName, 'public');
        } else {
            $fileName = Category::DEFAULT_CATEGORY_PHOTO_PATH;
            $filePath = Category::DEFAULT_CATEGORY_PHOTO_PATH;
        }

        $data = [
            'company_id' => Auth::user()->company->id,
            'title'      => $request->title,
            'text'       => $request->text,
            'slug'       => $slug,
            'image'      => $filePath,
            'image_seo'  => $fileName,
            'order'      => $request->order,
            'status'     => 1
        ];

        try {
            Category::create($data);

            return redirect()->back()->withSuccess(['msg' => 'Başarıyla Kaydedildi.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(int $categoryId)
    {
        $category = Category::where([
            'company_id' => Auth::user()->company->id,
            'id'         => $categoryId
        ])->firstOrFail();

        $data = [
            'id'    => $category->id,
            'title' => $category->title,
            'text'  => $category->text,
            'image' => $category->image,
            'order' => $category->order,
            'new_image',
        ];

        return Inertia::render('User/Category/Edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request)
    {
        try {
            $category = Category::findorFail($request->id);
            $slug     = Str::slug($request->title, '-');
            $newImage = isset($request->file()['new_image']) ? $request->file()['new_image'] : false;

            $data = [
                'id'     => $request->id,
                'title'  => $request->title,
                'text'   => $request->text,
                'slug'   => $slug,
                'order'  => $request->order,
                'status' => 1
            ];

            if ($newImage) {
                $newImageName = $slug . '-category-image-' . time() . '.' . $newImage->getClientOriginalExtension();
                $filePath = $newImage->storeAs('category-images', $newImageName, 'public');

                $data['image'] = $filePath;
                $data['image_seo'] = $newImageName;
            }

            $category->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Kategori güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $categoryId)
    {
        $category = Category::where([
            'company_id' => Auth::user()->company->id,
            'id'         => $categoryId
        ])->firstOrFail();

        try {
            $category->update([
                'status' => Category::STATUS_PASIVE
            ]);

            $category->allProducts()->update([
                'status' => Product::STATUS_PASIVE
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Kategori pasife alınırken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Retrieve the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function retrieve(Request $request, int $categoryId)
    {
        $category = Category::where([
            'company_id' => Auth::user()->company->id,
            'id'         => $categoryId
        ])->firstOrFail();

        try {
            $category->update([
                'status' => Category::STATUS_ACTIVE
            ]);

            $category->allProducts()->update([
                'status' => Product::STATUS_ACTIVE
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Kategori aktife alınırken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
