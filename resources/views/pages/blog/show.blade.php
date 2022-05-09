@extends('layouts.web')
@section('title', 'Blog Detaylar - Exxefy')

@section('content')

    <x-pageTitle title="Blog Detay"  />

 <section class="blog-details-page pd-top-120">
    <div class="container">
        <div class="row custom-gutters-60">
            <div class="col-lg-8">
                <div class="single-blog-content">
                    <div class="thumb">
                        <img src="/storage/{{ $blog->image }}" alt="{{ $blog->slug }}">
                    </div>
                    <div class="single-blog-details">
                        <ul class="post-meta">
                            <li class="admin">Exxefy</li>
                            <li>{{ $blog->created_at }}</li>
                        </ul>
                        <h5>{{ $blog->title }}</h5>
                        <p> {!! $blog->text !!} </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget-recent-post">
                        <h2 class="widget-title">Son Paylaşılan Bloglar</h2>
                        <ul>
                            @foreach ($blogs as $blog)
                                <li>
                                    <div class="media">
                                        <img src="/storage/{{ $blog->image }}" alt="{{ $blog->image_seo }}">
                                        <div class="media-body">
                                            <h6 class="title"><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h6>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>

    </div>
</section>

@endsection
