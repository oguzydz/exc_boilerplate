<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return Inertia::render('Admin/Category/Index', [
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
        return Inertia::render('Admin/Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        try {
            $image_seo = Str::slug($request->image_seo, '-');
            $slug = Str::slug($request->slug, '-');
            $getFile = $request->file()['image'];

            $fileName = $image_seo . '--' . time() . '.' . $getFile->getClientOriginalExtension();
            $filePath = $getFile->storeAs('kategoriler', $fileName, 'public');

            $data = [
                'title' => $request->title,
                'text' => $request->text,
                'slug' => $slug,
                'image' => $filePath,
                'image_seo' => $image_seo,
                'order' => $request->order,
                'status' => $this->booleanStatus($request->status)
            ];

            Category::create($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Kategori eklenirken beklenmedik bir hata oldu'));

            dd($e);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
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
        $category = Category::findOrFail($id);

        $data = [
            'id' => $category->id,
            'title' => $category->title,
            'text' => $category->text,
            'image' => $category->image,
            'image_seo' => $category->image_seo,
            'order' => $category->order,
            'status' => $this->booleanStatus($category->status),
            'slug' => $category->slug,
            'new_image',
        ];

        return Inertia::render('Admin/Category/Edit', [
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
            $category = Category::find($request->id);
            $slug = Str::slug($request->slug, '-');

            $data = [
                'id' => $request->id,
                'title' => $request->title,
                'text' => $request->text,
                'slug' => $slug,
                'image_seo' => $request->image_seo,
                'order' => $request->order,
                'status' => $this->booleanStatus($request->status)
            ];

            if (isset($request->file()['new_image'])) {
                $image_seo = Str::slug($request->image_seo, '-');

                $getFile = $request->file()['new_image'];
                $fileName = $image_seo . '--' . time() . '.' . $getFile->getClientOriginalExtension();
                $filePath = $getFile->storeAs('kategoriler', $fileName, 'public');

                $data['image'] = $filePath;
            }

            $category->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message',__('Kategori güncellenirken beklenmedik bir hata oldu'));

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
        $getImage = Category::findOrFail($id)->image;

        try {
            Storage::disk('public')->delete($getImage);
            Category::destroy($id);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message',__('Kategori silinirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }


    public function booleanStatus($status) {
        $list = collect([
            [
                'id' => 0,
                'boolean' => false,
            ],
            [
                'id' => 1,
                'boolean' => true,
            ]
        ]);
        return $list->where('id', $status)->first()['id'];
    }
}
