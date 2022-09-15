@extends('layouts.web')
@section('title', 'Mesafeli Üyelik Sözleşmesi - Exxefy')

@section('content')
    <x-pageTitle title="Gizlilik ve Koşullar" />

    <div class="service-area pd-top-112">
        <div class="container">
            <div class="row custom-gutters-16">
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="service">
                        <h6><a href="{{ route('policy.rule1') }}">Üyelik Sözleşmesi</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule1') }}"><img
                                    src="{{ asset('assets\img\service\arrow.png') }}" alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="service">
                        <h6><a href="{{ route('policy.rule4') }}">Listeleme Kuralları</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule4') }}"><img
                                    src="{{ asset('assets\img\service\arrow.png') }}" alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule5') }}">Yasaklı Ürünler</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule5') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule6') }}">Alışveriş Güvenliği</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule6') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule7') }}">Hizmet Bedeli Koşulları</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule7') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule8') }}">Ön Bilgilendirme Formu</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule8') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule10') }}">Teslim Koşulları</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule10') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule11') }}">İade Koşulları</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule11') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="service">
                        <h6><a href="{{ route('policy.rule2') }}">Kullanım Koşulları</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule2') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="service">
                        <h6><a href="{{ route('policy.rule3') }}">Uygulama Mağazası Kullanım Koşulları</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule3') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule12') }}">Kişisel Verilerin Korunması ve İşlenmesine İlişkin Aydınlatma Metni ve Gizlilik Politikası</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule12') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule13') }}">Uygulama Mağazası’na İlişkin Kişisel Verilerin Korunması ve İşlenmesine İlişkin Aydınlatma Metni ve Gizlilik Politikası</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule13') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule9') }}">Mesafeli Satış Sözleşmesi</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule9') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.rule14') }}">Yasal Uyarılar ve Çekinceler</a></h6>
                        <p>Devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.rule14') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
