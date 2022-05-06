@extends('layouts.shop.payment')
@section('title', 'Sipariş Takibi - Exxefy')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}

@section('content')
<div class="job-listing-page pd-top-190">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="section-title text-center">
                    <h2 class="title">Sipariş Takibi</h2>
                    <p>Aşağıya sipariş numaranızı girerek siparişinizin durumu hakkında tüm bilgilere ulaşabilirsiniz.</p>
                </div>
                <div class="category-apply-area">
                    <form class="exxefy-form-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-input-wrap">
                                    <input type="number" class="single-input">
                                    <label>Sipariş numaranızı giriniz...</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <a class="btn btn-blue" href="#">Gönder</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
