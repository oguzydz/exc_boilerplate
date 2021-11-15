@extends('layouts.web')
@section('title', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri')


@section('content')

    <x-pageTitle title="Blog" />

    <section class="our_blog_area clearfix section-padding-50-0" id="blog">
        <div class="container">
            <div class="row justify-content-center">

                <!-- Single Blog Post -->
                @foreach ($blogs as $blog)

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-area fadeInUp" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="blog_thumbnail">
                            <img src="storage/{{$blog->image}}" alt="{{$blog->image_seo}}">
                        </div>
                        <!-- Post Content -->
                        <div class="blog-content">

                            <div class="post-meta mt-20">
                                <p>By <a href="#" class="post-author">ADMIN</a> <a href="#">Apr 10, 2018</a></p>
                            </div>
                            <a href="{{ route( 'blog.show', $blog->slug) }}" class="post-title">
                                <h4>{{$blog->title}}</h4>
                            </a>
                            <p>{{Str::limit(strip_tags($blog->text), 150)}}</p>
                            <a href="{{ route( 'blog.show', $blog->slug) }}" class="btn info-btn mt-15">Detay'a Git</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Single Blog Post -->

            </div>
        </div>
    </section>



@endsection
