@extends('layouts.web')
@section('title', 'Mağazalarımız - Exxefy')
@section('description', 'Exxefy ile satış yapan mağazalarımız; sade tasarım ve güvenilir altyapımız sayesinde ürünlerini müşterilerine
kolaylıkla kavuşturmakta')

@section('content')
<x-pageTitle title="Mağazalar" />

<div class="team-area-wrpper pd-top-112">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-10">
                <div class="section-title text-center">
                    <h2 class="title">Exxefy Kullanan <span>Mağazalar</span></h2>
                    <p>
                        Exxefy ile satış yapan mağazalarımız; sade tasarım ve güvenilir altyapımız sayesinde ürünlerini müşterilerine
                        kolaylıkla kavuşturmakta aynı zamanda %100 müşteri memnuniyetini sağlamakta.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="team-area text-center">
        <div class="container">
            <div class="row custom-gutters-20">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team">
                        <div class="thumb">
                            <img src="assets\img\stores\evabid-magaza.jpg" alt="team">
                        </div>
                        <h6><a href="http://127.0.0.1:8000/evabid-home">Evabid Home</a></h6>
                        <span>Dekoratif Ev Ürünleri</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team">
                        <div class="thumb">
                            <img src="assets\img\stores\enmoda.jpg" alt="team">
                        </div>
                        <h6><a href="#">Enmoda</a></h6>
                        <span>Kadın-Erkek Giyim</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team">
                        <div class="thumb">
                            <img src="assets\img\stores\exxestock.jpg" alt="team">
                        </div>
                        <h6><a href="#">Exxestock</a></h6>
                        <span>Dijital Lisans Ürünleri</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team">
                        <div class="thumb">
                            <img src="assets\img\stores\naidesing-logo.jpeg" alt="team">
                        </div>
                        <h6><a href="#">Nai Design</a></h6>
                        <span>Dijital Lisans Ürünleri</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
