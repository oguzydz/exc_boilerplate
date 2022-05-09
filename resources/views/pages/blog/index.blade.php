@extends('layouts.web')
@section('title', 'Exxefy - Blog')


@section('content')

    <x-pageTitle title="Blog" />

    <section class="our_blog_area clearfix section-padding-50-0" id="blog">
        <div class="container">
            <div class="col-lg-12 pd-top-120">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                <!-- Single Blog Post -->
                @foreach ($blogs as $blog)
                    <div class="single-blog-content">
                        <div class="thumb">
                            <img src="/storage/{{ $blog->image }}" alt="{{ $blog->image_seo }}">
                        </div>
                        <div class="single-blog-details">
                            <ul class="post-meta">
                                <li class="admin">Exxefy</li>
                            <li>{{ $blog->created_at }}</li>
                            </ul>
                            <h5><a href=" {{ route('blog.show', $blog->slug )}} "> {{ $blog->title }} </a></h5>
                            <p> {{Str::limit(strip_tags($blog->text), 150 )}} </p>
                            <a href="{{ route('blog.show', $blog->slug) }}">Devamını Oku... <span><i class="la la-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Single Blog Post -->

            </div>
        </div>
    </section>



@endsection
