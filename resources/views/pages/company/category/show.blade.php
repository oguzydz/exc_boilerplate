@extends('layouts.shop.light')
@section('title', 'Dijital Lisans Ürünleri | Ucuz Stok Görsel - Exxestock')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}


@section('content')
<x-pageTitle parentTitle="Kategoriler" parentRoute="{{ route($company->slug . '.category.index') }}" title="{{ $category->title }}" />

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
                                <strong>{{ $category->title }}</strong> kategorisinde Toplam {{ $categoryProducts->total() }} adet ürün bulundu ve {{ $categoryProducts->currentPage() }}. sayfadasınız.
                            </div>
                        </div>
                        <div class="col-sm-4 mg-bottom-30">
                            <select class="select nice-select woocommerce-sorting-select float-sm-right">
                                <option value="1">Varsayılan</option>
                                <option value="2">Fiyata Göre</option>
                                <option value="3">Son Eklenen</option>
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
                                                <a class="btn btn-red" onclick="addToCart({{ $product->id }}); return false" href="#">Sepete Ekle <i
                                                        class="fa fa-shopping-cart"></i></a>
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
                                        <a href="{{ route($company->slug . ".product.show", [$product->slug]) }}">{{ $product->title }}</a>
                                        <div class="price">
                                            <span>₺{{ $product->price }}</span><del>₺{{ $product->discount_price }}</del>
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
                <x-shop.aside/>
            </div>
        </div>
    </div>
</div>

@endsection
