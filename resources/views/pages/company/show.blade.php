@extends('layouts.shop.light')
@section('title', $product->title . ' - Exxefy')
@section('description', 'Kredi kartı ile güvenle ' . $product->title . ' satın almak için tıklayın.')

@section('content')
    <x-pageTitle parentTitle="Kategoriler" parentRoute="{{ route($companySlug . '.category.index') }}"
        childTitle="{{ $product->category->title }}"
        childRoute="{{ route($companySlug . '.category.show', [$product->category->slug]) }}"
        title="{{ $product->title }}" />

    <div class="single-product-area pd-top-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="product-thumbnail-wrapper">
                        <div class="row custom-gutters-16">
                            <div class="col-3">
                                <div class="product-thumbnail-carousel">
                                    <div class="single-thumbnail-item">
                                        <img src="/storage/{{ $product->image }}" alt="shop">
                                    </div>
                                    @foreach ($product->gallery as $gallery)
                                        <div class="single-thumbnail-item">
                                            <img src="/storage/{{ $gallery->image }}" alt="shop">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="single-thumbnail-slider">
                                    <div class="slider-item">
                                        <img src="/storage/{{ $product->image }}" width="614px" alt="shop">
                                    </div>
                                    @foreach ($product->gallery as $gallery)
                                        <div class="single-thumbnail-item">
                                            <img src="/storage/{{ $gallery->image }}" alt="shop">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product-description">
                        <span class="customer-review"><i class="fa fa-star"></i>0.0 <span>(Henüz yorum
                                girilmemiş)</span></span>
                        <h4 class="title">{{ $product->title }}</h4>
                        <div class="price">
                            <span>₺{{ $product->price }}</span>
                            <del>₺{{ $product->discount_price }}</del>
                        </div>
                        <p class="content">
                            {{ Str::substr($product->text, 0, 100) }}, <ins class="">Detaylı açıklama için
                                sayfayı kaydırınız.</ins>
                        </p>
                        <div class="quantity-wrap">
                            <button class="btn btn-gray cart-btn" onclick="addToCart({{ $product->id }})" type="button"
                                id="cart-btn">Sepete Ekle <i class="fa fa-shopping-cart"></i></button>
                            <button class="btn btn-green text-white cart-btn ml-xl-3 ml-sm-2"
                                onclick="addToCart({{ $product->id }}, 1, '{{ $companySlug }}')" type="button">Satın
                                Al<i class="fa fa-shopping-cart"></i></button>
                        </div>
                        <div class="category">
                            <span>Ürün Kategorisi: </span>
                            <a href="#">Watch</a>
                        </div>
                        <div class="tags">
                            <span>Stok: </span>
                            <a href="#">11</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product-information">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="descr-tab" data-toggle="tab" href="#descr" role="tab"
                                    aria-controls="descr" aria-selected="true">Açıklama</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                    aria-controls="reviews" aria-selected="false">Yorumlar</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="descr" role="tabpanel" aria-labelledby="descr-tab">
                                <div class="row">
                                    <div class="col-lg-11">
                                        <div class="description-tab-content">
                                            <p>{!! nl2br($product->text) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="review-area">
                                            <h6 class="review-title">Yorumlar (0)</h6>
                                            <div class="single-review">
                                                <div class="media">
                                                    <img class="media-left" src="/assets\img\blog\comments\1.png"
                                                        alt="img">
                                                    <div class="media-body">
                                                        <span>Exxefy</span>
                                                        <p>Sistem Bilgilendirme</p>
                                                    </div>
                                                </div>
                                                <p>
                                                    Ürüne henüz yorum girilmedi.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="review-title">Yorum Ekle</h6>
                                <form class="exxefy-form-wrap" method="POST">
                                    <div class="row custom-gutters-16">
                                        <div class="col-md-6">
                                            <div class="single-input-wrap">
                                                <textarea class="single-input textarea" cols="20"></textarea>
                                                <label class="single-input-label">Yorum</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-input-wrap">
                                                <input type="text" class="single-input">
                                                <label>Ad - Soyad</label>
                                            </div>
                                            <div class="single-input-wrap">
                                                <input type="text" class="single-input">
                                                <label>E-Posta</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-right">
                                            <button class="btn btn-green" type="submit">Gönder</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (count($relatedProducts))
            <div class="shop-page-area single-shop-related-product mg-top-105">
                <div class="container">
                    <div class="section-title">
                        <h2 class="title">Benzer Ürünler</h2>
                    </div>
                    <div class="row custom-gutters-16">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single-shop">
                                    <div class="thumb">
                                        <img src="/storage/{{ $relatedProduct->image }}" alt="shop">
                                        <div class="cart-btn">
                                            <div class="cart-btn-wrap">
                                                <a class="btn btn-red"
                                                    onclick="addToCart({{ $relatedProduct->id }}); return false"
                                                    href="#">Sepete Ekle <i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <a
                                            href="{{ route($companySlug . '.product.show', $relatedProduct->slug) }}">{{ $relatedProduct->title }}</a>
                                        <div class="price">
                                            <span>₺{{ $relatedProduct->price }}</span><del>₺{{ $relatedProduct->discount_price }}</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>

@endsection
