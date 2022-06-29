@extends('layouts.shop.light')
@section('title', 'Dijital Lisans Ürünleri | Ucuz Stok Görsel - Exxefy')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}


@section('content')
    <x-pageTitle parentTitle="Kategoriler" parentRoute="{{ route($company->slug . '.category.index') }}"
        title="{{ $category->title }}" />

    <div class="shop-page-area pd-top-50">
        <div class="container">
            <div class="row custom-gutters-60">
                {{-- <div class="col-md-12 section-title">
                <h2 class="title wow  fadeInUp animated" data-wow-duration="0.6s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 0.1s; animation-name: fadeInUp;">
                    Tüm Ürünler
                </h2>
                </div> --}}
                <div class="col-lg-8">
                    <div class="row justify-content-start">
                        <div class="col-sm-8">
                            <div class="woocommerce-result-count mb-3">
                                <strong>{{ $category->title }}</strong> kategorisinde Toplam
                                {{ $categoryProducts->total() }} adet ürün bulundu ve
                                {{ $categoryProducts->currentPage() }}. sayfadasınız.
                            </div>
                        </div>
                        <div class="col-sm-4 mg-bottom-30">
                            <select name="orderBy" class="select woocommerce-sorting-select float-sm-right"
                                form="home-filter" onchange="this.form.submit()">
                                <option value="0" {{ Request()->orderBy == 0 ? 'selected' : '' }}>Varsayılan Sıralama
                                </option>
                                <option value="1" {{ Request()->orderBy == 1 ? 'selected' : '' }}>Fiyata Göre</option>
                                <option value="2" {{ Request()->orderBy == 2 ? 'selected' : '' }}>Son Eklenen</option>
                            </select>
                        </div>
                        @foreach ($categoryProducts as $product)
                            <div class="col-lg-4 col-sm-4 col-6">
                                <div class="single-shop">
                                    <div class="thumb">
                                        {{-- <a class="product-badge btn-blue" href="#">New</a> --}}
                                        <img src="/storage/{{ $product->image }}" alt="shop">
                                        <div class="cart-btn">
                                            <div class="cart-btn-wrap">
                                                <a class="btn btn-red"
                                                    onclick="addToCart({{ $product->id }}); return false" href="#">Sepete
                                                    Ekle <i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        {{-- <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div> --}}
                                        <a
                                            href="{{ route($company->slug . '.product.show', [$product->slug]) }}">{{ $product->title }}</a>
                                        <div class="price">
                                            <span>{{ $product->price }} TL</span><del>{{ $product->discount_price }}
                                                TL</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            {{ $categoryProducts->links('vendor.pagination.default') }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <x-shop.aside />
                </div>
            </div>
        </div>
    </div>

    <div class="sbst-provide-security mg-top-100 mg-bottom-120" style="background-image:url({{ asset('assets/img/startup/why-choose/2.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-6">
                    <div class="img-with-video img-with-video-2 wow  fadeInRight animated" data-wow-duration="1s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInRight;">
                        <div class="img-wrap">
                            <img src="/storage/{{ $category->image }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 desktop-center-item">
                    <div class="wow  fadeInLeft animated" data-wow-duration="1s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInLeft;">
                        <div class="section-title style-two">
                            <h2 class="title">{{ $category->title }}</h2>
                            <p>{{ $category->text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
