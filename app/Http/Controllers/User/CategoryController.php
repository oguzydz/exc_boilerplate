<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        $categories = Category::where('company_id', $this->userService->getUserCompany(Auth::user()->id)->id)->paginate(10);

        return Inertia::render('User/Category/Index', [
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
    public function store(CreateCategoryRequest $request)
    {
        $userCompanyId = $this->userService->getUserCompany(Auth::user()->id)->id;
        $slug = Str::slug($request->title, '-');
        $getFile = $request->file()['image'];

        $fileName = $slug . '--' . $userCompanyId . '.' . $getFile->getClientOriginalExtension();
        $filePath = $getFile->storeAs('category-images', $fileName, 'public');

        $data = [
            'company_id' => $userCompanyId,
            'title' => $request->title,
            'text' => $request->text,
            'slug' => $slug,
            'image' => $filePath,
            'image_seo' => $fileName,
            'order' => $request->order,
            'status' => 1
        ];

        try {
            Category::create($data);

            return redirect()->back()->withSuccess(['msg' => 'Başarıyla Kaydedildi.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
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
        $userCompanyId = $this->userService->getUserCompany(Auth::user()->id)->id;
        $category = Category::where(['company_id' => $userCompanyId->id, 'id' => $id])->firstOrFail();

        $data = [
            'id' => $category->id,
            'title' => $category->title,
            'text' => $category->text,
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
            $slug = Str::slug($request->title, '-');
            $newImage = isset($request->file()['new_image']) ? $request->file()['new_image'] : false;

            $data = [
                'id' => $request->id,
                'title' => $request->title,
                'text' => $request->text,
                'slug' => $slug,
                'order' => $request->order,
                'status' => 1
            ];

            if($newImage) {
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
            $request->session()->flash('message', __('Kategori silinirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
