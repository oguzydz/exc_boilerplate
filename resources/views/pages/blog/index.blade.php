@extends('layouts.web')
@section('title', 'Exxefy - Blog')

@section('content')
    <x-pageTitle title="Blog" />

    <section class="our_blog_area clearfix section-padding-50-0" id="blog">
        <div class="container">
            <div class="col-lg-12 pd-top-120">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @foreach ($blogs as $blog)
                            <div class="single-blog-content">
                                <div class="thumb">
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        <img src="/storage/{{ $blog->image }}" alt="{{ $blog->image_seo }}">
                                    </a>
                                </div>
                                <div class="single-blog-details">
                                    <ul class="post-meta">
                                        <li class="admin">Exxefy</li>
                                        <li>
                                            {{ date_format($blog->created_at, 'd-m-Y') }}
                                        </li>
                                    </ul>
                                    <h5><a href=" {{ route('blog.show', $blog->slug) }} "> {{ $blog->title }} </a></h5>
                                    <p> {!! Str::limit($blog->text, 150) !!} </p>
                                    <a href="{{ route('blog.show', $blog->slug) }}">Devamını Oku... <span><i
                                                class="la la-long-arrow-right"></i></span></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
@endsection
