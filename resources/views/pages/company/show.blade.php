@extends('layouts.shop.light')
@section('title', 'Dijital Lisans Ürünleri | Ucuz Stok Görsel - Exxestock')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}


@section('content')

<div class="single-product-area pd-top-120">
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
                                <div class="single-thumbnail-item">
                                    <img src="assets\img\shop-details\02.png" alt="shop">
                                </div>
                                <div class="single-thumbnail-item">
                                    <img src="assets\img\shop-details\03.png" alt="shop">
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="single-thumbnail-slider">
                                <div class="slider-item">
                                    <img src="/storage/{{ $product->image }}" alt="shop">
                                </div>
                                <div class="slider-item">
                                    <img src="assets\img\shop-details\2.png" alt="shop">
                                </div>
                                <div class="slider-item">
                                    <img src="assets\img\shop-details\3.png" alt="shop">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product-description">
                    <span class="customer-review"><i class="fa fa-star"></i>0.0 <span>(Henüz yorum girilmemiş)</span></span>
                    <h4 class="title">{{ $product->title }}</h4>
                    <div class="price">
                        <span>₺{{ $product->price }}</span>
                        <del>₺{{ $product->discount_price }}</del>
                    </div>
                    <p class="content">
                        {{ Str::substr($product->text, 0, 100) }}, <ins class="">Detaylı açıklama için sayfayı kaydırınız.</ins>
                    </p>
                    <div class="quantity-wrap">
                        <div class="quantity float-left">
                            <input type="number" step="1" min="0" max="100" value="1" title="Qty" class="input-text qty text">
                        </div>
                        <button class="btn btn-gray ml-xl-5 ml-sm-4 cart-btn" onclick="addToCart({{ $product->id }})" type="button" id="cart-btn">Sepete Ekle <i class="fa fa-shopping-cart"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-7">
                            <button class="w-100 btn btn-gray mt-4" type="button">Hemen Satın Al</button>
                        </div>
                    </div>
                    <div class="category">
                        <span>Ürün Kategorisi: </span>
                        <a href="#">Watch</a>
                    </div>
                    <div class="tags">
                        <span>Satıcı: </span>
                        <a href="#">Watch,</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product-information">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="descr-tab" data-toggle="tab" href="#descr" role="tab" aria-controls="descr" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="descr" role="tabpanel" aria-labelledby="descr-tab">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="description-tab-content">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                        <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="review-area">
                                        <h6 class="review-title">Reviews (32)</h6>
                                        <div class="single-review">
                                            <div class="media">
                                                <img class="media-left" src="assets\img\blog\comments\1.png" alt="img">
                                                <div class="media-body">
                                                    <span>Jabel Ali</span>
                                                    <p>CEO</p>
                                                </div>
                                            </div>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                        </div>
                                    </div>
                                    <div class="review-area">
                                        <div class="single-review">
                                            <div class="media">
                                                <img class="media-left" src="assets\img\blog\comments\1.png" alt="img">
                                                <div class="media-body">
                                                    <span>Jabel Ali</span>
                                                    <p>CEO</p>
                                                </div>
                                            </div>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="review-title">Your Reviews</h6>
                            <form class="riyaqas-form-wrap">
                                <div class="row custom-gutters-16">
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <textarea class="single-input textarea" cols="20"></textarea>
                                            <label class="single-input-label">Review</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input type="text" class="single-input">
                                            <label>Name</label>
                                        </div>
                                        <div class="single-input-wrap">
                                            <input type="text" class="single-input">
                                            <label>E-mail</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <a class="btn btn-green" href="#">Submit</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>


@endsection
