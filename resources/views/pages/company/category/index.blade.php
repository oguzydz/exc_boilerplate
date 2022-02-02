@extends('layouts.shop.payment')
@section('title', 'Dijital Lisans Ürünleri | Ucuz Stok Görsel - Exxestock')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}


@section('content')
    <div class="category-listing-page pd-top-50">
        <div class="container">
            <div class="category-position-area">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title style-four">
                            <h2 class="title">Kategoriler</h2>
                            <p> Mağazanın hizmet verdiği tüm kategorileri bu sayfadan görüp, dilediğiniz kategorinin
                                ürünlerine gidebilirsiniz.</p>
                        </div>
                        @foreach ($categories as $category)
                            <div class="single-category-list media">
                                <img src="/storage/{{ $category->image }}" alt="service">
                                <div class="media-body">
                                    <h6>{{ $category->title }}</h6>
                                    <span>{{ $category->text }}</span>
                                </div>
                                <button class="category-apply-btn align-self-center float-right">Ürünleri Gör</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
