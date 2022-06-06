@extends('layouts.shop.payment')
@section('title', 'İşlem Başarılı | Exxefy')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}


@section('content')
    <x-pageTitle title="Ödeme Başarılı" />

    <section>
        <div class="map-area pd-top-120">
            <div class="container">
                <div class="map-area-wrap">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-md-6 m-auto">
                            <img src="{{ asset('assets/img/icons/check2.svg') }}" alt="Sipariş Tamamlandı"
                                class="successPhoto" width="150">
                            <div class="payment-result text-center mt-2">
                                <h2 class="sub-title">Siparişiniz tamamlanmıştır!</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 desktop-center-item">
                            <div>
                                <div class="contact-info">
                                    <h4 class="title">Siparişiniz #1124523:</h4>
                                    <p class="sub-title">Siparişinizin teslimatı için sipariş bilgileriniz satıcıya
                                        iletilmiştir. Bizi tercih ettiğiniz için teşekkür ederiz.</p>
                                    <p><span>Ürün:</span> T-shirt</p>
                                    <p><span>Satıcı:</span> Exxefy</p>
                                    <p><span>Sipariş no:</span> 1124523</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cross İconlu Hali--}}
    <section>
        <div class="map-area pd-top-120">
            <div class="container">
                <div class="map-area-wrap">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-md-6 m-auto">
                            <img src="{{ asset('assets/img/icons/cross.svg') }}" alt="Sipariş Tamamlandı"
                                class="successPhoto" width="150">
                            <div class="payment-result text-center mt-2">
                                <h2 class="sub-title">Siparişiniz tamamlanmıştır!</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 desktop-center-item">
                            <div>
                                <div class="contact-info">
                                    <h4 class="title">Siparişiniz #1124523:</h4>
                                    <p class="sub-title">Siparişinizin teslimatı için sipariş bilgileriniz satıcıya
                                        iletilmiştir. Bizi tercih ettiğiniz için teşekkür ederiz.</p>
                                    <p><span>Ürün:</span> T-shirt</p>
                                    <p><span>Satıcı:</span> Exxefy</p>
                                    <p><span>Sipariş no:</span> 1124523</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
