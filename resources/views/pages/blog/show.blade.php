@extends('layouts.web')
@section('title', 'Blog Detaylar - Exxefy')

@section('content')

    <x-pageTitle title="Blog Detay"  />

 <section class="blog-details-page pd-top-120">
    <div class="container">
        <div class="row custom-gutters-60">
            <div class="col-lg-10">
                <div class="single-blog-content">
                    <div class="thumb">
                        <img src="/storage/{{ $blog->image }}" alt="{{ $blog->slug }}">
                    </div>
                    <div class="single-blog-details">
                        <ul class="post-meta">
                            <li class="admin">Admin</li>
                            <li>August 29, 2019 /</li>
                        </ul>
                        <h5>{{ $blog->title }}</h5>
                        <p> {{ strip_tags($blog->text) }} </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <div class="sect-icon justify-content-center fadeInUp" data-wow-delay="0.2s">
                        <img src="img/svg/section-icon-4.svg" alt="">
                    </div>
                    <h2 class="fadeInUp" data-wow-delay="0.3s">Benzer Bloglar</h2>
                </div>
            </div>
        </div>
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Single Blog Post -->
                    @foreach ($blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-blog-area fadeInUp" data-wow-delay="0.2s">
                            <!-- Post Thumbnail -->
                            <div class="blog_thumbnail">
                                <img src="/storage/{{$blog->image}}" alt="{{$blog->image_seo}}">
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
    </div>
</section>

@endsection
