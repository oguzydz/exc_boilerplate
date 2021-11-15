@extends('layouts.web')
@section('title', $category->title . ' - Exxestock')


@section('content')

    <x-pageTitle title="{{ $category->title }}" parentTitle="Kategoriler" parentRoute="{{ route('category.index') }}" />

    <section class="features section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                        <div class="sect-icon justify-content-center fadeInUp" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <img src="img/svg/section-icon-4.svg" alt="">
                        </div>
                        <h2 class="fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">{{ $category->title }}
                        </h2>
                        <p class="fadeInUp" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            {!! mb_substr(strip_tags($category->text), 0, 100) . '...'!!}
                        </p>
                    </div>
                </div>
                @foreach ($category->products as $product)
                    <div class="services-column col-lg-4 col-md-12 col-xs-12">
                        <div class="services-block-four">
                            <div class="inner-box pl-0 text-center">
                                <div class="mb-3">
                                    <a href="{{ route('product.show.' . $product->slug) }}"><img src="storage/{{ $product->image }}" alt=""></a>
                                </div>
                                <h3><a href="{{ route('product.show.' . $product->slug) }}">{{ $product->title }}</a></h3>
                                <div class="text">
                                    {!! mb_substr(strip_tags($product->text), 0, 100) . '...'!!}
                                </div>
                                <div class="list-wrap align-items-center">
                                    <div class="row">
                                        @foreach ($product->featuresWithLimit as $feature)
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
                                    <h1 class="d-inline-block">{{ $product->price }} TL</h1>
                                    <h5 class="d-inline-block">{{ $product->discount_price}} TL</h5>
                                </div>
                                <a class="btn info-btn mt-20 " data-wow-delay="0.6s"
                                    href="{{ route('product.show.' . $product->slug) }}">
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
