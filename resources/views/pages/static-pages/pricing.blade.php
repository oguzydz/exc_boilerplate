@extends('layouts.web')
@section('title', 'Kendi Özel Mağazanızı Açın ve Ürünlerinizi Kolayca Satın - Exxefy')
@section('description', 'Exxefy: kendi özelleştirilmiş mağazanızdan kolayca satış yapıp ödeme almanızı sağlar.')

@section('content')
<x-pageTitle title="Fiyatlandırma" />

<div class="pricing-page-area pd-top-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="single-pricing text-center">
                    <h6 class="title">ÜYELİK PAKETİ</h6>
                    <div class="thumb">
                        <img src="{{ asset('assets\img\price\2.png') }}" alt="fiyatlandirma">
                    </div>
                    <h3 class="price">Exxefy <span>/Sınırsız</span></h3>
                    <ul>
                        <li>Ücretsiz Üyelik</li>
                        <li>Sınırsız Ürün Listeleme</li>
                        <li>Hiçbir Ek Ücret Yok</li>
                        <li>Modern ve Sade Tasarım</li>
                        <li>7/24 Destek</li>
                        <li><strong>%2,99
                            + 0,49 TL İşlem Ücreti,</strong>
                        </li>
                        <li><strong>%3,99
                            + 0,49 TL (Yurtdışı) </strong>
                        </li>
                    </ul>
                    <a class="btn btn-white btn-rounded" href="{{ route('register') }}">Hemen Başla</a>
                </div>
            </div>
            <div class="col-xl-9 col-lg-4 col-sm-6">
                <div class="section-title style-two mb-0">
                    <h2 class="title">Hemen <span>En Uygun</span> fiyatlandırma ile satışa başla!</h2>
                    <p>
                        Exxefy'da bireysel veya kurumsal üyelik farketmeksizin satış yapabilirsiniz. Ürünlerinizi en sade ve kolay
                        pazarlamanın yolu exxefy'da saniyeler içinde hesap açabilir, ürünlerinizi listeleyebilirsiniz.
                    </p>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="exxefy-check-list media mg-top-45">
                                <img class="media-left" src="{{ asset('assets\img\icons\check.svg') }}" alt="check">
                                <span>
                                    Müşterilerinizden; kredi kartı, banka kartı veya havale seçenekleri ile ödeme alabilirsiniz.
                                    Müşterilerinize en uygun ödeme seçeneğini sağlamak için hemen kayıt olun.
                                </span>
                            </div>
                            <div class="exxefy-check-list media mg-top-45">
                                <img class="media-left" src="{{ asset('assets\img\icons\check.svg') }}" alt="check">
                                <span>
                                    Ödemelerinizi ertesi gün veya kendi seçeceğiniz bir günde otomatik olarak alabilirsiniz.
                                </span>
                            </div>
                            <div class="exxefy-check-list media mg-top-45">
                                <img class="media-left" src="{{ asset('assets\img\icons\check.svg') }}" alt="check">
                                <span>
                                    Exxefy'da sattığınız tüm ürünlerde kredi kartı kullanan müşterilerinize taksit imkanı sağlayabilirsiniz.
                                    Müşterileriniz taksitle ödeme yaparken, siz ödemenin tamamını alırsınız.
                                </span>
                            </div>
                            <div class="exxefy-check-list media mg-top-45">
                                <img class="media-left" src="{{ asset('assets\img\icons\check.svg') }}" alt="check">
                                <span>
                                    Modern ve kullanıcı dostu tasarımlar ile müşterileriniz ürünlerinizi net bir şekilde tanıyabilir ve
                                    kolay ödeme adımlarıyla siparişini verebilir.
                                </span>
                            </div>

                            <a href="{{ route('register') }}" class="apply-btn">Hemen Kayıt Ol</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
