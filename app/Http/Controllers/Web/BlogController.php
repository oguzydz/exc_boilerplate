<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $blogs = Blog::paginate(5);

        return view('pages.blog.index', [
            'blogs' => $blogs
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $blog = Blog::where('slug', $request->slug)->firstOrFail();
        $blogs = Blog::all();

        return view('pages.blog.show', [
            'blog' => $blog,
            'blogs' => $blogs
        ]);
    }

}
