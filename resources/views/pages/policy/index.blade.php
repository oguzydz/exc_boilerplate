@extends('layouts.web')
@section('title', 'Mesafeli Üyelik Sözleşmesi - Exxefy')

@section('content')
    <x-pageTitle title="Gizlilik Ve Koşullar" />

    <div class="service-area pd-top-112">
        <div class="container">
            <div class="row custom-gutters-16">
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="service">
                        <h6><a href="{{ route('policy.varranty') }}">Garanti Ve İade</a></h6>
                        <p>Garanti ve iade şartlarımızın devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.varranty') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="service">
                        <h6><a href="{{ route('policy.security') }}">Gizlilik Politikası</a></h6>
                        <p>Gizlilik politikasının devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.security') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="service">
                        <h6><a href="{{ route('policy.delivery') }}">Ödeme Ve Teslimat</a></h6>
                        <p>Ödeme ve teslimat politikasının devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.delivery') }}"><img
                                    src="{{ asset('assets\img\service\arrow.png') }}" alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="service">
                        <h6><a href="{{ route('policy.agreement') }}">Üyelik Sözleşmesi</a></h6>
                        <p>Üyelik sözleşmesinin devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.agreement') }}"><img
                                    src="{{ asset('assets\img\service\arrow.png') }}" alt="arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="single-service">
                        <img src="{{ asset('assets\img\service\project.svg') }}" alt="Politikalar İconu">
                        <h6><a href="{{ route('policy.sales') }}">Satış Sözleşmesi</a></h6>
                        <p>Satış sözleşmesinin devamını okumak için tıklayın.</p>
                        <div class="read-more">
                            <a href="{{ route('policy.sales') }}"><img src="{{ asset('assets\img\service\arrow.png') }}"
                                    alt="arrow"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
