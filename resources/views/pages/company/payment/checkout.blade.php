@extends('layouts.shop.payment')
@section('title', 'Dijital Lisans Ürünleri | Ucuz Stok Görsel - Exxefy')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}


@section('content')
    <div class="checkout-page-area pd-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="checkout-form-wrap">
                        <div class="checkout-title">
                            <div class="row">
                                <div class="col-xl-5 col-lg-12 col-md-6">
                                    <h6>Teslimat Bilgileri</h6>
                                </div>
                                {{-- <div class="col-xl-7 col-lg-12 col-md-6 text-xl-right text-lg-left text-md-right">
                                <span>Already have an account?</span>
                                <a id="signIn-btn" href="#">Sign in /</a>
                                <a id="signUp-btn" href="#">Sign Up</a>
                            </div> --}}
                            </div>
                        </div>
                        <div class="checkout-form">
                            <form class="exxefy-form-wrap">
                                <div class="row custom-gutters-20">
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="email" type="email" required class="single-input">
                                            <label class="">E-Posta</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="phone" type="number" required class="single-input">
                                            <label>Telefon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="name" type="text" required class="single-input">
                                            <label>Adınız</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="surname" type="text" required class="single-input">
                                            <label>Soyadınız</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-input-wrap">
                                            <input name="address" type="text" required class="single-input">
                                            <label>Adres</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <select name="city" required class="select single-select">
                                                <option value="1">Şehir</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <select name="county" required class="select single-select">
                                                <option value="1">İlçe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="zip_code" type="text" required class="single-input">
                                            <label>Posta Kodu</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 padding-top-50">
                                        <div class="checkout-title">
                                            <h6>Ödeme Biçimi</h6>
                                        </div>
                                        <div class="payment-method">
                                            <ul class="pl-0">
                                                <li>
                                                    <input name="payment_type" type="radio" checked required
                                                        class="single-input">
                                                    Kredi Kartı ile Öde
                                                    <img src="{{ asset('assets\img\footer/footer_logo-2.png') }}"
                                                        alt="img">

                                                </li>
                                                {{-- <li>
                                                    <input name="payment_type" type="radio" required class="single-input">
                                                    Havale/Eft
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12 payment-description">
                                        <span class="d-block check-box-area">
                                            <input id="1checkbox" type="checkbox" name="kvkk" required>
                                            <label for="1checkbox">
                                                KVKK İlişkin Aydınlatma Metni’ni okudum.
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-12 text-right">
                                        <a class="btn btn-green" href="#">Ödemeye Geç</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="checkout-form-product">
                        <div class="order-table table-responsive">
                            <table class="table">
                                <tbody>
                                    @if (count(Cart::content()))
                                        @foreach (Cart::content() as $cart)
                                            <tr>
                                                <td>
                                                    <div class="media single-cart-product">
                                                        <div class="media-left">
                                                            <img src="/storage/{{ $cart->options->image }}"
                                                                style="width: 90px;" alt="img">
                                                        </div>
                                                        <div class="media-body">
                                                            <span>{{ $cart->name }}</span>
                                                            <p>Adet: {{ $cart->qty }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart-product-price text-center">
                                                    ₺{{ $cart->price * $cart->qty }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>

                                            <td>
                                                Sepetinizde henüz ürün bulunamadı.
                                            </td>
                                        </tr>

                                    @endif
                                </tbody>
                            </table>
                            <div class="total-shapping-area-wrap">
                                <div class="total-shapping-area">
                                    <div class="charge">
                                        <span>Ara Toplam:</span>
                                        <span class="amount float-right"><span
                                                class="woocommerce-Price-currencySymbol">₺</span>{{ Cart::total() }}</span>
                                    </div>
                                    <div class="charge pt-0">
                                        <span>Kargo Ücreti:</span>
                                        <span class="amount float-right"><span
                                                class="woocommerce-Price-currencySymbol">₺</span>15</span>
                                    </div>
                                    <div class="total-amount">
                                        <span>Genel Toplam:</span>
                                        <span class="amount float-right font-weight-bold"><span
                                                class="woocommerce-Price-currencySymbol font-weight-bold">₺</span>{{ Cart::total() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
