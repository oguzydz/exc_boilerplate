@extends('layouts.web')
@section('title', 'Hakkımızda - Exxestock')


@section('content')

    <x-pageTitle title="Hakkımızda" />

 <section class="about-us-area section-padding-100 clearfix">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left">
                <div class="welcome-meter fadeInUp" data-wow-delay="0.7s">
                    <img src="https://image.shutterstock.com/image-illustration/sisyphus-man-pushing-heavy-bolder-600w-123855541.jpg" alt="">
                </div>
            </div>

            <div class="col-12 col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                <div class="who-we-contant mt-s">
                    <div class="sect-icon text-left fadeInUp" data-wow-delay="0.2s">
                        <img src="img\svg\section-icon-2.svg" alt="">
                    </div>
                    <h4 class="fadeInUp" data-wow-delay="0.3s">Exxestock - Lisanslı Ürün Platormu</h4>
                    <p class="fadeInUp" data-wow-delay="0.4s">
                        exxefy.com, sağlamış olduğu sağlamış olduğu altyapı sayesinde Stok görsel, lisanslı hesaplar ve hayatı kolaylaştıran birçok dijital lisansı en uygun fiyata sağlamaktadır.
                    </p>
                    <p class="fadeInUp" data-wow-delay="0.5s">
                        Tüm ürünler kendi yasal, orijinal hesaplarımızdan hazırlanarak zaman ve mekan farketmeksizin anında gönderilmektedir.
                    </p>
                    <a class="btn info-btn mt-30 fadeInUp" data-wow-delay="0.6s" href="{{ route('product.index') }}">Ürünlerimiz</a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
