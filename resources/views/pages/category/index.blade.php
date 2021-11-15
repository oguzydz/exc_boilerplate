@extends('layouts.web')
@section('title', 'Kategoriler - Exxestock')


@section('content')

    <x-pageTitle title="Kategoriler" />

    <section class="features section-padding-100">
        <div class="container">

            <div class="section-heading text-center">

                <div class="sect-icon justify-content-center fadeInUp" data-wow-delay="0.2s">
                    <img src="img/svg/section-icon-3.svg" alt="">
                </div>
                <h2 class="fadeInUp" data-wow-delay="0.3s">Kategorilerimiz</h2>
                <p class="fadeInUp" data-wow-delay="0.4s">
                    Hizmet verdiğimiz dijital lisans ürünlerine kategoriler yardımıyla erişebilir, kolayca sipariş
                    verebilirsiniz.
                </p>
            </div>


            <div class="row">
                @foreach ($categories as $category)

                    <div class="services-column col-lg-4 col-md-12 col-xs-12">
                        <div class="services-block-four">
                            <div class="inner-box pl-0 text-center">
                                <div class="mb-3">
                                   <a href="{{ route('category.show.' . $category->slug) }}"><img src="storage/{{ $category->image }}" alt=""></a>
                                </div>
                                <h3><a href="{{ route('category.show.' . $category->slug) }}">{{ $category->title }}</a></h3>
                                <div class="text">
                                    {!! mb_substr(strip_tags($category->text), 0, 100) . '...' !!}
                                </div>
                                <a class="btn info-btn mt-20 " data-wow-delay="0.6s"
                                    href="{{ route('category.show.' . $category->slug) }}">
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
