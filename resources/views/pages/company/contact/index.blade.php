@extends('layouts.shop.payment')
@section('title', 'Dijital Lisans Ürünleri | Ucuz Stok Görsel - Exxefy')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}

@section('content')
<x-pageTitle title="İletişim" />

<div class="contact-form-area pd-top-112">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section-title text-center w-100">
                    <h2 class="title">Mağazayla iletişime<span> geç</span></h2>
                    <p>
                        Aşağıdaki formu doldurarak mağazaya mesaj gönderebilir veya en altta yer alan iletişim bilgileri yardımıyla
                        mağaza ile doğrudan iletişime geçebilirsiniz.
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5">
                <img src="{{ asset('assets\img\others\21.png') }}" alt="blog">
            </div>
            <div class="col-lg-7 offset-xl-1">
                <form class="exxefy-form-wrap mt-5 mt-lg-0">
                    <div class="row custom-gutters-16">
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <input type="text" class="single-input">
                                <label>Ad-Soyad</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <input type="text" class="single-input">
                                <label>E-Posta</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-input-wrap">
                                <input type="text" class="single-input">
                                <label>Konu</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-input-wrap">
                                <textarea class="single-input textarea" cols="20"></textarea>
                                <label class="single-input-label">Mesaj</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-red mt-0" href="#">Gönder</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="map-area pd-top-120">
    <div class="container">
        <div class="map-area-wrap">
            <div class="row no-gutters">

                <div class="col-lg-12 desktop-center-item">
                    <div>
                        <div class="contact-info">
                            <h4 class="title">Mağaza Bilgileri:</h4>
                            <p class="sub-title">
                                Aşağıda mağazanın gerçek, sisteme kayıtlı iletişim bilgileri yer almaktadır.
                            </p>
                            <p><span>Mağaza:</span> {{ $company->title }}</p>
                            <p><span>Telefon:</span> {{ $company->phone }}</p>
                            <p><span>E-Posta:</span> {{ $company->email }}</p>
                            <p><span>Logo:</span>
                                <img class="img d-block" src="/storage/{{ $company->logo }}" style="width: 100px" alt="profile">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
