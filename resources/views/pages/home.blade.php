@extends('layouts.web')
@section('title', 'Kendi Mağazanı Aç ve Ürünlerini Satmaya Başla - Exxefy')
@section('description', 'Exxefy: kendi özelleştirilmiş mağazanızdan kolayca satış yapıp ödeme almanızı sağlar. Exxefy ile hemen bir online mağaza açıp satış yapmaya başlayın!')

@section('content')
    <!-- header area start -->
    <div class="header-area header-bg" style="background-image:url({{ asset('assets/img/bg/banner-bg.png') }});">
        <div class="container">
            <div class="banner-slider banner-slider-one">
                <div class="banner-slider-item">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-6 offset-xl-1">
                            <div class="header-inner-details">
                                <div class="header-inner">
                                    <h1 class="title s-animate-1">Ücretsiz <span>mağaza</span> açıp satışa başla!</h1>
                                    <p class="s-animate-2">Exxefy ile hemen ücretsiz mağazanı açarak satışa
                                        başlayabilirsiniz. <br>
                                        Tüm bankalardan ödeme alabilir ve kullanışlı arayüz ile mağazanızı yönetebilirsiniz.
                                    </p>
                                    <div class="btn-wrapper desktop-left padding-top-20">
                                        <a href="{{ asset('register') }}"
                                            class="btn btn-radius btn-green s-animate-3">Hemen Kayıt Ol</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 hidden-sm">
                            <div class="banner-thumb-wrap">
                                <div class="banner-thumb">
                                    <img class="header-inner-img" src="assets/img/banner/15.png" alt="banner-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-slider-item">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-6  offset-xl-1">
                            <div class="header-inner-details">
                                <div class="header-inner">
                                    <h1 class="title s-animate-1">Güvenli ve hızlı <span>mağazanı</span> oluştur!</h1>
                                    <p class="s-animate-2">Güvenilir ve hızlı bir alt yapı ile ürünlerini herkese
                                        gösterebilirsin. <br>
                                        Exxefy kullanıcı dostu bir mağaza tasarımı sunmaktadır, hemen şimdi ücretsiz
                                        deneyebilirsiniz.</p>
                                    <div class="btn-wrapper desktop-left padding-top-20">
                                        <a href="{{ asset('register') }}"
                                            class="btn btn-radius btn-green s-animate-3">Hemen Kayıt Ol</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 hidden-sm">
                            <div class="banner-animate-thumb">
                                <div class="header-img-1 wow animated fadeInRight" data-wow-duration="1s"
                                    data-wow-delay="0s">
                                    <img src="assets/img/startup/slider/1.png" alt="banner-img">
                                </div>
                                <div class="header-img-2 wow animated fadeInDown" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <img src="assets/img/startup/slider/2.png" alt="banner-img">
                                </div>
                                <div class="header-img-3 wow animated fadeInDown" data-wow-duration="1s"
                                    data-wow-delay="0.8s">
                                    <img src="assets/img/startup/slider/3.png" alt="banner-img">
                                </div>
                                <div class="header-img-4 wow animated fadeInDown" data-wow-duration="1s"
                                    data-wow-delay="1.0s">
                                    <img src="assets/img/startup/slider/4.png" alt="banner-img">
                                </div>
                                <div class="header-img-5 wow animated fadeInDown" data-wow-duration="1s"
                                    data-wow-delay="1.3s">
                                    <img src="assets/img/startup/slider/5.png" alt="banner-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-slider-item">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-6  offset-xl-1">
                            <div class="header-inner-details">
                                <div class="header-inner">
                                    <h1 class="title s-animate-1">Tüm bankalardan <span>ödeme</span> al!</h1>
                                    <p class="s-animate-2">Exxefy'da tüm banka kartlarından sorunsuz ödeme
                                        alabilirsiniz.<br>
                                        Hemde piyasadaki en uygun komisyonlandırma sistemi ile ertesi gün paranız
                                        hesabınızda.</p>
                                    <div class="btn-wrapper desktop-left padding-top-20">
                                        <a href="{{ asset('register') }}"
                                            class="btn btn-radius btn-green s-animate-3">Hemen Kayıt Ol</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 hidden-sm">
                            <div class="banner-thumb-wrap">
                                <div class="banner-thumb">
                                    <img class="header-inner-img" src="assets/img/banner/66v.png" alt="banner-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area End -->

    <!-- service area start -->
    <div class="service-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10">
                    <div class="section-title text-center margin-bottom-90">
                        <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">Neden
                            <span>Exxefy</span> Kullanmalıyım?
                        </h2>
                        <p class="wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
                            Ürünlerini pazarlamanın en butik yolu, Exxefy ile ürün satışlarını kolaylaştır.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row custom-gutters-16">
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service wow animated fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.1s">
                        <img src="{{ asset('assets/img/features/1.svg') }}" alt="service">
                        <h6><a href="#">Sınırsız Ürün Ekleme</a></h6>
                        <p>
                            Exxefy'da mağazana sınırsız kategori ve ürünü ücretsiz ekleyip, satabilirsin.
                            Ayrıca ürüne birçok özellik, resim, kategori ve benzeri yenilikler ekleyebilirsiniz.
                        </p>
                        <div class="read-more">
                            <a href="#"><img src="assets\img\service\arrow.png" alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
                        <img src="{{ asset('assets/img/features/2.svg') }}" alt="service">
                        <h6><a href="#">Tüm Ödeme Yöntemleri</a></h6>
                        <p>
                            Exxefy altyapısı tüm ödeme yöntemlerini desteklemektedir. Bu sayede ürünlerinizi kesintisiz
                            hiç uğraşmadan heryere kolayca satıp, kargolayabilirsiniz.
                        </p>
                        <div class="read-more">
                            <a href="#"><img src="assets\img\service\arrow.png" alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service wow animated fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <img src="assets/img/features/3.svg" alt="service">
                        <h6><a href="#">Hızlı ve Sade Tasarım</a></h6>
                        <p>
                            Responsive mağazanız ile ürünlerinizi en iyi şekilde müşterilerinize
                            tanıtabilir. Kullanıcı dostu arayüz sayesinde kolayca alışveriş yapmasını sağlayabilirsiniz.
                        </p>
                        <div class="read-more">
                            <a href="#"><img src="assets\img\service\arrow.png" alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <img src="assets/img/features/4.svg" alt="service">
                        <h6><a href="#">A+ Yönetim Paneli</a></h6>
                        <p>
                            Mağazanı, siparişlerini, kargolarını, müşterilerini, satış raporlarını kısaca aklınıza
                            gelebilecek herşeyi
                            Exxefy Yönetim Paneli ile kolayca yönetebilirsiniz.
                        </p>
                        <div class="read-more">
                            <a href="#"><img src="assets\img\service\arrow.png" alt="arrow"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area End -->


    <div class="sba-work-area img-with-video-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 order-lg-12 desktop-center-item">
                    <div class="section-title ml-xl-4 mb-lg-0 style-two text-lg-left text-center wow animated fadeInRight"
                        data-wow-duration="1s" data-wow-delay="0.3s">
                        <h2 class="title">Exxefy Platformu <br> Nasıl <span>Çalışır?</span></h2>
                        <p>
                            Size özel mağazanızı nasıl oluşturursunuz kısaca anlattık. Sizlerde hemen kayıt olarak;
                            Mağazanızı özelleştirip, ürünlerinizi listeleyebilir ve dakikalar içerisinde satışa hazır
                            olabilirsiniz.
                        </p>
                        <a class="btn btn-green text-white" href="{{ route('register') }}" style="line-height: 52px;">Hemen Başla</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 order-lg-1 wow animated fadeInLeft" data-wow-duration="1s"
                    data-wow-delay="0.3s">
                    <div class="img-with-video">
                        <div class="img-wrap">
                            <img src="assets\img\we-provide\01.png" alt="video">
                            <div class="hover">
                                <a href="https://www.youtube.com/watch?v=c7XEhXZ_rsk" class="video-play-btn mfp-iframe"><img
                                        src="assets\img\we-provide\3.svg" alt="video"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="business-time pd-top-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-6 sbimg-center-align">
                    <div class="img-with-video img-with-video-2 margin-bottom-40">
                        <div class="img-wrap sbdm-image-gurd2">
                            <img class="sbdm-image-1" src="assets/img/bg/12.png" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 offset-xl-1 desktop-center-item">
                    <div class="mg-top-767-45">
                        <div class="section-title style-two">
                            <h2 class="title">Sosyal medya <span>takipçilerin</span> müşterin olsun!</h2>
                            <p>
                                Exxefy alt yapısı ile artık sosyal medyadaki takipçilerine kendi mağazan üzerinden
                                ürünlerini satabilirsin.
                            </p>
                            <p>
                                Takipçilerine sana özel ürettiğimiz alan adı ile kolayca ulaşmasını sağlayabilirsin.
                                Sosyal medya takipçilerin artık müşterin olsun istiyorsan
                                hemen ücretsiz kayıt ol!
                            </p>
                            <a class="btn btn-green text-white" href="{{ route('register') }}" style="line-height: 52px;">Hemen Kayıt Ol</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- testimonial area Start -->
    <div class="testimonial-section sbs-testimonial-section pd-top-105 pd-bottom-120"
        style="background-image:url(assets/img/bg/1h3.png);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 pd-xl-5 order-lg-12 align-self-center ">
                    <div class="section-title style-two mb-0">
                        <h2 class="title">Kullanıcılarımız <span>Ne Diyor?</span></h2>
                        <p>
                            Exxefy sayesinde işini geliştiren, kullanıcılarımız bizim
                            hakkımızda ne anlatıyor? Sizlerde ücretsiz mağazanızı açarak hemen satış yapmaya başlayabilirsiniz.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="sbs-testimonial-slider">
                        <div class="choose_slider">
                            <div class="choose_slider_items">
                                <ul id="testimonial-slider">
                                    <li class="current_item">
                                        <div class="media">
                                            <img class="media-left" src="{{ asset('assets\img\client\5.png') }}" alt="client">
                                            <div class="media-body">
                                                <h6>Müşteri Adı</h6>
                                                <p class="designation">Müşteri Firması</p>
                                                <span>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <p>
                                            Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter.
                                        </p>
                                    </li>
                                    <li class="current_item">
                                        <div class="media">
                                            <img class="media-left" src="{{ asset('assets\img\client\5.png') }}" alt="client">
                                            <div class="media-body">
                                                <h6>Müşteri Adı</h6>
                                                <p class="designation">Müşteri Firması</p>
                                                <span>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <p>
                                            Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter.
                                        </p>
                                    </li>
                                    <li class="current_item">
                                        <div class="media">
                                            <img class="media-left" src="{{ asset('assets\img\client\5.png') }}" alt="client">
                                            <div class="media-body">
                                                <h6>Müşteri Adı</h6>
                                                <p class="designation">Müşteri Firması</p>
                                                <span>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <p>
                                            Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter.
                                        </p>
                                    </li>
                                    <li class="current_item">
                                        <div class="media">
                                            <img class="media-left" src="{{ asset('assets\img\client\5.png') }}" alt="client">
                                            <div class="media-body">
                                                <h6>Müşteri Adı</h6>
                                                <p class="designation">Müşteri Firması</p>
                                                <span>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <p>
                                            Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter.
                                        </p>
                                    </li>
                                    <li class="current_item">
                                        <div class="media">
                                            <img class="media-left" src="{{ asset('assets\img\client\5.png') }}" alt="client">
                                            <div class="media-body">
                                                <h6>Müşteri Adı</h6>
                                                <p class="designation">Müşteri Firması</p>
                                                <span>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <p>
                                            Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter.
                                        </p>
                                    </li>
                                    <li class="current_item">
                                        <div class="media">
                                            <img class="media-left" src="{{ asset('assets\img\client\5.png') }}" alt="client">
                                            <div class="media-body">
                                                <h6>Müşteri Adı</h6>
                                                <p class="designation">Müşteri Firması</p>
                                                <span>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <p>
                                            Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter. Müşteri yorumu gelecektir, 120 karakter.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sbs-arrowleft"><a id="btn_next" href="#"><i class="fa fa-long-arrow-left"></i></a>
                        </div>
                        <div class="sbs-arrowright"><a id="btn_prev" href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area End -->

@endsection
