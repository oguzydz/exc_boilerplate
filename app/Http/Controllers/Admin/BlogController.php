<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\EditBlogRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(5);

        return Inertia::render('Admin/Blog/Index', [
            'data' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = Blog::all();

        return Inertia::render('Admin/Blog/Create',[
            'blog' => $blog
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlogRequest $request)
    {
        try {
            $image_seo = Str::slug($request->image_seo, '-');

            $getFile  = $request->file()['image'];
            $fileName = $image_seo . '--' . time() . '.' . $getFile->getClientOriginalExtension();
            $slug     = Str::slug($request->title, '-') . '--' . Blog::getNextId();
            $filePath = $getFile->storeAs('blog', $fileName, 'public');

            $data = [
                'title'       => $request->title,
                'text'        => $request->text,
                'slug'        => $slug,
                'image'       => $filePath,
                'image_seo'   => $image_seo,
                'category_id' => $request->category_id,
            ];

            Blog::create($data);

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
     * @param  int  $blogId
     * @return \Illuminate\Http\Response
     */
    public function edit(int $blogId)
    {
        try {
            $blog = Blog::findOrFail($blogId);

            $data = [
                'id'        => $blog->id,
                'title'     => $blog->title,
                'text'      => $blog->text,
                'image'     => $blog->image,
                'image_seo' => $blog->image_seo,
                'new_image',
            ];

            return Inertia::render(
                'Admin/Blog/Edit',
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
     * @param  \App\Models\Blog  $customerComment
     * @return \Illuminate\Http\Response
     */
    public function update(EditBlogRequest $request)
    {
        $blog = Blog::findOrFail($request->id);

        $data = [
            'title'     => $request->title,
            'text'      => $request->text,
            'image'     => $request->image,
            'image_seo' => $request->image_seo,
        ];

        if (isset($request->file()['new_image'])) {
            $image_seo = Str::slug($request->image_seo, '-');

            $getFile  = $request->file()['new_image'];
            $fileName = $image_seo . '--' . time() . '.' . $getFile->getClientOriginalExtension();
            $filePath = $getFile->storeAs('blog', $fileName, 'public');

            $data['image'] = $filePath;
        }

        try {
            $blog->update($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Blog güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $customerComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $blogId)
    {
        $getImage = Blog::find($blogId)->image;

        try {
            Storage::disk('public')->delete($getImage);
            Blog::destroy($blogId);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request
                ->session()
                ->flash(
                    'message',
                    __('Blog silinirken beklenmedik bir hata oldu!')
                );

            return redirect()->back();
        }
    }
}
