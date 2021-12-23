@extends('layouts.web')
@section('title', 'Dijital Lisans Ürünleri | Ucuz Stok Görsel - Exxestock')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}


@section('content')
<!-- header area start -->
<div class="header-area header-bg" style="background-image:url({{asset('assets/img/bg/banner-bg.png') }});">
    <div class="container">
        <div class="banner-slider banner-slider-one">
            <div class="banner-slider-item">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-6 offset-xl-1">
                        <div class="header-inner-details">
                            <div class="header-inner">
                                <h1 class="title s-animate-1">Ücretsiz <span>mağaza</span> açıp satışa başla!</h1>
                                <p class="s-animate-2">Exxefy ile hemen ücretsiz mağazanı açarak satışa başlayabilirsiniz. <br>
                                    Tüm bankalardan ödeme alabilir ve kullanışlı arayüz ile mağazanızı yönetebilirsiniz.</p>
                                <div class="btn-wrapper desktop-left padding-top-20">
                                    <a href="{{ asset('register') }}" class="btn btn-radius btn-green s-animate-3">Hemen Kayıt Ol</a>
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
                                <p class="s-animate-2">Güvenilir ve hızlı bir alt yapı ile ürünlerini herkese gösterebilirsin. <br>
                                     Exxefy kullanıcı dostu bir mağaza tasarımı sunmaktadır, hemen şimdi ücretsiz deneyebilirsiniz.</p>
                                <div class="btn-wrapper desktop-left padding-top-20">
                                    <a href="{{ asset('register') }}" class="btn btn-radius btn-green s-animate-3">Hemen Kayıt Ol</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 hidden-sm">
                        <div class="banner-thumb-wrap">
                            <div class="banner-thumb">
                                <img class="header-inner-img" src="assets\img\banner\01.png" alt="banner-img">
                                <img class="banner-1-img2" src="assets\img\banner\02.png" alt="banner-img">
                                <img class="banner-1-img3" src="assets\img\banner\03.png" alt="banner-img">
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
                                <p class="s-animate-2">Exxefy'da tüm banka kartlarından sorunsuz ödeme alabilirsiniz.<br>
                                     Hemde piyasadaki en uygun komisyonlandırma sistemi ile ertesi gün paranız hesabınızda.</p>
                                <div class="btn-wrapper desktop-left padding-top-20">
                                    <a href="#" class="btn btn-radius btn-green s-animate-3">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 hidden-sm">
                        <div class="banner-thumb-wrap">
                            <div class="banner-thumb">
                                <img class="header-inner-img" src="assets\img\banner\1.png" alt="banner-img">
                                <img class="banner-1-img2" src="assets\img\banner\2.png" alt="banner-img">
                                <img class="banner-1-img3" src="assets\img\banner\03.png" alt="banner-img">
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
                    <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">What <span>Service</span> We are Providing?</h2>
                    <p class="wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">Offer your business with the best assistance for growth.</p>
                </div>
            </div>
        </div>
        <div class="row custom-gutters-16">
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="single-service wow animated fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.1s">
                    <img src="assets\img\service\project.svg" alt="service">
                    <h6><a href="#">Branding Idendity</a></h6>
                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                    <div class="read-more">
                        <a href="#"><img src="assets\img\service\arrow.png" alt="arrow"></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="single-service wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
                    <img src="assets\img\service\hiring.svg" alt="service">
                    <h6><a href="#">Business Consultancy</a></h6>
                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                    <div class="read-more">
                        <a href="#"><img src="assets\img\service\arrow.png" alt="arrow"></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="single-service wow animated fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                    <img src="assets\img\service\checklist.svg" alt="service">
                    <h6><a href="#">UI/UX - Design</a></h6>
                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                    <div class="read-more">
                        <a href="#"><img src="assets\img\service\arrow.png" alt="arrow"></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="single-service wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                    <img src="assets\img\service\analytics.svg" alt="service">
                    <h6><a href="#">Market Analysis</a></h6>
                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                    <div class="read-more">
                        <a href="#"><img src="assets\img\service\arrow.png" alt="arrow"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service area End -->

<!-- soft-box area start -->
<div class="sbs-what-exxefy pd-default-120 mg-top-105" style="background-image:url(assets/img/bg/1h1.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                <img src="assets\img\we-provide\5.png" alt="img">
            </div>
            <div class="col-xl-5 col-lg-6 desktop-center-item">
                <div class="desktop-center-area wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title style-two">
                        <h2 class="title">What is <span>exxefy?</span></h2>
                        <p>SoftBox One of the best Softwire Development company. SoftBox is at the forefront as the most innovative web development company. Our cost efficient and structured teamwork justifies our position. Our clients count on our offshore business</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="exxefy-check-list">
                                <img src="assets\img\icons\check.svg" alt="check">
                                <span>Concept Design</span>
                            </div>
                            <div class="exxefy-check-list">
                                <img src="assets\img\icons\check.svg" alt="check">
                                <span>Concept Implementation</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="exxefy-check-list">
                                <img src="assets\img\icons\check.svg" alt="check">
                                <span>Concept Development</span>
                            </div>
                            <div class="exxefy-check-list">
                                <img src="assets\img\icons\check.svg" alt="check">
                                <span>Testing work</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- soft-box area End -->

<div class="sbs-talented-people mg-top-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 offset-xl-1 desktop-center-item">
                <div class="desktop-center-area">
                    <div class="section-title style-three">
                        <h2 class="title">300+ Talented People</h2>
                        <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                    </div>
                    <div class="talented-pepole-list">
                        <ul>
                            <li>
                                <h3 class="count-num">30</h3>
                                <span>UI/UX Designer</span>
                            </li>
                            <li>
                                <h3 class="count-num">228</h3>
                                <span>Developer</span>
                            </li>
                            <li>
                                <h3 class="count-num">8</h3>
                                <span>Architect</span>
                            </li>
                            <li>
                                <h3 class="count-num">30</h3>
                                <span>Project Manager</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="world-map-wrap">
                    <img src="assets\img\others\map.png" alt="map">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- soft-box area start -->
<div class="sbs-provide-security pd-top-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 offset-xl-1 order-lg-12 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="mask-bg-wrap mask-bg-img-3 mb-lg-0 mb-4">
                    <div class="thumb">
                        <img src="assets\img\we-provide\7.png" alt="video">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 order-lg-1 align-self-center wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="section-title style-two">
                    <h2 class="title"><span>Developers</span> First</h2>
                </div>
                <div class="exxefy-stab">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#d_tabs_1">exxefy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#d_tabs_2">Curl</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#d_tabs_3">Resize</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#d_tabs_4">Doct</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="d_tabs_1">
                            <div class="exxefy-stab-content">
                                <p>exxefy One of the best Softwire Development company. The forefront as the most innovative web development company. Our cost efficient and structured teamwork justifies our position. Our clients count on our offshore business solutions on a regular.</p>
                                <p>From concept design to development, testing & implementation, our team is here to support and guide you every step of the way.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="d_tabs_2">
                            <div class="exxefy-stab-content">
                                <p>exxefy Two of the best Softwire Development company. The forefront as the most innovative web development company. Our cost efficient and structured teamwork justifies our position. Our clients count on our offshore business solutions on a regular.</p>
                                <p>From concept design to development, testing & implementation, our team is here to support and guide you every step of the way.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="d_tabs_3">
                            <div class="exxefy-stab-content">
                                <p>exxefy Three of the best Softwire Development company. The forefront as the most innovative web development company. Our cost efficient and structured teamwork justifies our position. Our clients count on our offshore business solutions on a regular.</p>
                                <p>From concept design to development, testing & implementation, our team is here to support and guide you every step of the way.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="d_tabs_4">
                            <div class="exxefy-stab-content">
                                <p>exxefy Four of the best Softwire Development company. The forefront as the most innovative web development company. Our cost efficient and structured teamwork justifies our position. Our clients count on our offshore business solutions on a regular.</p>
                                <p>From concept design to development, testing & implementation, our team is here to support and guide you every step of the way.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- soft-box area End -->

<!-- soft-box area start -->
<div class="leftside-image-area service-area sbs-business-tool pd-bottom-120 mg-top-120" style="background-image:url(assets/img/bg/1h2.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-7 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                <img src="assets\img\business-tool\1.png" alt="img">
            </div>
            <div class="col-xl-5 col-lg-6 desktop-center-item">
                <div class="desktop-center-area wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title style-two">
                        <h2 class="title">All kind of <span>Business <br> tools</span> integration.</h2>
                        <p>Our support team will get assistance from AI-powered suggestions, <br> making it quicker than ever to handle support requests.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="exxefy-check-list media">
                                <img class="media-left" src="assets\img\business-tool\pencil.svg" alt="check">
                                <span>Our support team will get assistance from AI-powered suggestions, making it quicker than.</span>
                            </div>
                            <div class="exxefy-check-list media">
                                <img class="media-left" src="assets\img\business-tool\search.svg" alt="check">
                                <span>Our support team will get assistance from AI-powered suggestions.</span>
                            </div>
                            <div class="exxefy-check-list media mg-bottom-0-991">
                                <img class="media-left" src="assets\img\business-tool\settings.svg" alt="check">
                                <span>Our support team will get assistance from AI-powered, making it quicker than ever to handle support.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- soft-box area End -->

<!-- soft-box area start -->
<div class="sbs-provide-security pd-top-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 order-lg-12 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="img-with-video">
                    <div class="img-wrap">
                        <img src="assets\img\we-provide\1.png" alt="video">
                        <div class="hover">
                            <a href="https://www.youtube.com/watch?v=c7XEhXZ_rsk" class="video-play-btn mfp-iframe"><img src="assets\img\we-provide\3.svg" alt="video"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 order-lg-1 align-self-center wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="section-title style-two">
                    <h2 class="title">How We Providing <br> Strong <span>Security</span></h2>
                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle requests  to handle suggestions assistance it requests.</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="exxefy-check-list">
                            <img class="media-left" src="assets\img\icons\9.svg" alt="check">
                            <span>Unique Design</span>
                        </div>
                        <div class="exxefy-check-list">
                            <img class="media-left" src="assets\img\icons\10.svg" alt="check">
                            <span>Custom domain</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="exxefy-check-list">
                            <img class="media-left" src="assets\img\icons\11.svg" alt="check">
                            <span>Mobile ready</span>
                        </div>
                        <div class="exxefy-check-list">
                            <img class="media-left" src="assets\img\icons\12.svg" alt="check">
                            <span>Testing work</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- soft-box area End -->

<!-- testimonial area Start -->
<div class="testimonial-section sbs-testimonial-section pd-top-105 pd-bottom-120" style="background-image:url(assets/img/bg/1h3.png);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 pd-xl-5 order-lg-12 align-self-center ">
                <div class="section-title style-two mb-0">
                    <h2 class="title">What Our <span>Client Say?</span></h2>
                    <p>Our support team will get assistance from AI-powered <br> suggestions, making it quicker than ever to handle support <br>requests. assistance from AI-powered</p>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="sbs-testimonial-slider">
                    <div class="choose_slider">
                        <div class="choose_slider_items">
                            <ul id="testimonial-slider">
                                <li class="current_item">
                                    <div class="media">
                                        <img class="media-left" src="assets\img\client\4.png" alt="client">
                                        <div class="media-body">
                                            <h6>Wilson Mojika</h6>
                                            <p class="designation">Founder at todo</p>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                                </li>
                                <li class="current_item">
                                    <div class="media">
                                        <img class="media-left" src="assets\img\client\5.png" alt="client">
                                        <div class="media-body">
                                            <h6>Ema Wilson</h6>
                                            <p class="designation">CEO at craft</p>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                                </li>
                                <li class="current_item">
                                    <div class="media">
                                        <img class="media-left" src="assets\img\client\6.png" alt="client">
                                        <div class="media-body">
                                            <h6>John Mojika</h6>
                                            <p class="designation">CTO of Uxa</p>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                                </li>
                                <li class="current_item">
                                    <div class="media">
                                        <img class="media-left" src="assets\img\client\4.png" alt="client">
                                        <div class="media-body">
                                            <h6>Refule Mia</h6>
                                            <p class="designation">CEO at craft</p>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                                </li>
                                <li class="current_item">
                                    <div class="media">
                                        <img class="media-left" src="assets\img\client\5.png" alt="client">
                                        <div class="media-body">
                                            <h6>Madeniko Mojika</h6>
                                            <p class="designation">Branding Idendity</p>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                                </li>
                                <li class="current_item">
                                    <div class="media">
                                        <img class="media-left" src="assets\img\client\6.png" alt="client">
                                        <div class="media-body">
                                            <h6>Madeniko Mojika</h6>
                                            <p class="designation">CTO of Uxa</p>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p>Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sbs-arrowleft"><a id="btn_next" href="#"><i class="fa fa-long-arrow-left"></i></a></div>
                    <div class="sbs-arrowright"><a id="btn_prev" href="#"><i class="fa fa-long-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial area End -->
@endsection
