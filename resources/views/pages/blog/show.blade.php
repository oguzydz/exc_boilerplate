@extends('layouts.web')
@section('title', 'Hakkımızda Detaylar - Exxefy')


@section('content')

    <x-pageTitle title="Blog Detay"  />

 <section class="about-us-area section-padding-100 clearfix">


    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left">
                <div class="welcome-meter fadeInUp" data-wow-delay="0.7s">
                    <img src="/storage/{{ $blog->image }}" alt="{{ $blog->image_seo }}">
                </div>
            </div>

            <div class="col-12 col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                <div class="who-we-contant mt-s">
                    <div class="sect-icon text-left fadeInUp" data-wow-delay="0.2s">
                        <img src="img\svg\section-icon-2.svg" alt="">
                    </div>
                    <h4 class="fadeInUp" data-wow-delay="0.3s">{{ $blog->title }}</h4>
                    <p class="fadeInUp" data-wow-delay="0.4s">{{ strip_tags($blog->text) }}</p>
                    <a class="btn info-btn mt-30 fadeInUp" data-wow-delay="0.6s" href="{{ route('blog.index') }}">Diğer Blog Yazılarımız</a>
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
