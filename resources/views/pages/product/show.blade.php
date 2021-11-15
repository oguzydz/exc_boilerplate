@extends('layouts.web')
@section('title', $product->title . ' - Exxestock')
@section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri')


@section('content')

    <x-pageTitle parentTitle="{{ $product->category->title }}" parentRoute="{{ route('category.show.' . $product->category->slug) }}" title="{{ $product->title }}" />

    <section class="section-padding-100 clearfix" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="welcome-meter fadeInUp" data-wow-delay="0.7s">
                        <img src="storage/{{ $product->image }}" class="img-responsive center-block" alt="">

                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="who-we-contant mt-s">
                        <h4 class=" fadeInUp" data-wow-delay="0.3s">{{ $product->title }}</h4>
                        <p class="fadeInUp" data-wow-delay="0.5s">
                            {!! $product->text !!}
                        </p>
                        <div class="list-wrap align-items-center">
                            <div class="row">
                                @foreach ($product->features as $feature)
                                    <div class="col-md-6">
                                        <div class="side-feature-list-item">
                                            <img src="img/features/feature-6.svg" class="check-mark-icon" alt="">
                                            <div class="foot-c-info">{{ $feature->title }}</div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-6">
                                    <div class="side-feature-list-item">
                                        <img src="img/features/feature-6.svg" class="check-mark-icon" alt="">
                                        <div class="foot-c-info">Hemen Teslim</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="side-feature-list-item">
                                        <img src="img/features/feature-6.svg" class="check-mark-icon" alt="">
                                        <div class="foot-c-info">7/24 Destek</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="price_table_text">
                            <h1 class="d-inline-block">{{ $product->price }} TL</h1>
                            <h5 class="d-inline-block">{{ $product->discount_price }} TL</h5>
                        </div>
                        <div class="clearfix"></div>
                        <a class="btn info-btn fadeInUp mt-20" data-wow-delay="0.6s"
                            href="{{ route('user.order.create', ['product' => $product->slug]) }}">
                            Hemen Satın Al
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                        <div class="sect-icon justify-content-center fadeInUp" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <img src="img/svg/section-icon-4.svg" alt="">
                        </div>
                        <h2 class="fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Benzer Ürünler
                        </h2>
                        <p class="fadeInUp" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            Çok satan Shutterstock, Canva, Adobe Stock ve benzeri ihtiyacınız olan ürünleri aşağıdaki
                            listeden bulabilir hemen satın alabilirsiniz.
                        </p>
                    </div>
                </div>
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="services-column col-lg-4 col-md-12 col-xs-12">
                        <div class="services-block-four">
                            <div class="inner-box pl-0 text-center">
                                <div class="mb-3">
                                    <a href="{{ route('product.show.' . $relatedProduct->slug) }}"><img src="storage/{{ $relatedProduct->image }}" alt=""></a>
                                </div>
                                <h3><a href="{{ route('product.show.' . $relatedProduct->slug) }}">{{ $relatedProduct->title }}</a></h3>
                                <div class="text">
                                    {!! mb_substr(strip_tags($relatedProduct->text), 0, 100) . '...'!!}
                                </div>
                                <div class="list-wrap align-items-center">
                                    <div class="row">
                                        @foreach ($relatedProduct->featuresWithLimit as $feature)
                                            <div class="col-md-12">
                                                <div class="side-feature-list-item justify-content-center">
                                                    <img src="img/features/feature-6.svg" class="check-mark-icon" alt="">
                                                    <div class="foot-c-info">{{ $feature->title }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-md-12">
                                            <div class="side-feature-list-item justify-content-center">
                                                <img src="img/features/feature-6.svg" class="check-mark-icon" alt="">
                                                <div class="foot-c-info">Hemen Teslim</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="side-feature-list-item justify-content-center">
                                                <img src="img/features/feature-6.svg" class="check-mark-icon" alt="">
                                                <div class="foot-c-info">7/24 Destek</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="price_table_text">
                                    <h1 class="d-inline-block">{{ $relatedProduct->price }} TL</h1>
                                    <h5 class="d-inline-block">{{ $relatedProduct->discount_price}} TL</h5>
                                </div>
                                <a class="btn info-btn mt-20 " data-wow-delay="0.6s"
                                    href="{{ route('product.show.' . $relatedProduct->slug) }}">
                                    Görüntüle
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
