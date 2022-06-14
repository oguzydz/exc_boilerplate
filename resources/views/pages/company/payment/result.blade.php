@extends('layouts.shop.payment')
@section('title', 'İşlem Başarılı | Exxefy')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}

@section('content')
    <x-pageTitle title="Ödeme Başarılı" />
    <div class="map-area pd-top-120">
        <div class="container">
            <div class="map-area-wrap">
                <div class="row no-gutters justify-content-center">
                    <div class="col-md-6 m-auto">
                        <div class="payment-result text-center mt-4">
                            <img src="{{ asset('assets/img/icons/check2.svg') }}" alt="Sipariş Tamamlandı"
                                class="successPhoto mb-4" width="150">
                            <h2 class="sub-title">SİPARİŞİNİZ ALINDI</h2>
                            <p class="mb-0">
                                Alışverişinizin detayları {{ $order->email }} e-posta adresine gönderilmiştir.
                            </p>
                            <p>
                                Siparişinizin son durumunu
                                sipariş numarası ile <strong>Sipariş Takibi</strong> ekranından anlık takip
                                edebilirsiniz.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 m-auto">
                        <div>
                            <div class="contact-info text-md-left text-center">
                                <h4 class="title">Siparişiniz #{{ $order->id }}:</h4>
                                <p class="sub-title">Siparişinizin teslimatı için sipariş bilgileriniz satıcıya
                                    iletilmiştir. Exxefy ile hızlı ve güvenilir alışverişi tercih ettiğiniz için
                                    teşekkür ederiz.</p>
                                <p><span>Sipariş Numarası:</span> #{{ $order->id }}</p>
                                <p><span>Ara Toplam:</span> {{ $order->sub_total_price }} TL</p>
                                <p><span>Kargo Ücreti:</span> {{ $order->cargo_price }} TL</p>
                                <p><span>Genel Toplam:</span> {{ $order->total_price }} TL</p>
                                <p><span>Satıcı:</span> {{ $company->title }}</p>
                            </div>
                        </div>
                    </div>
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
                                    Aşağıda mağazanın gerçek, sisteme kayıtlı ve onaylanmış iletişim bilgileri yer
                                    almaktadır.
                                </p>
                                <p><span>Mağaza:</span> {{ $company->title }}</p>
                                <p><span>Telefon:</span> {{ $company->phone }}</p>
                                <p><span>E-Posta:</span> {{ $company->email }}</p>
                                @if ($company->corporate_name)
                                    <p><span>Şirket Ünvanı:</span> {{ $company->corporate_name }}</p>
                                    <p><span>Vergi No:</span> {{ $company->taxpayer_identification_number }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
