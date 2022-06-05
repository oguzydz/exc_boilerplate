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
                                            <input name="name" type="text" class="single-input" required>
                                            <label>Adınız</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="surname" type="text" class="single-input" required>
                                            <label>Soyadınız</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="email" type="email" class="single-input" required>
                                            <label class="">E-Posta</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="phone" type="number" class="single-input" required>
                                            <label>Telefon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-input-wrap">
                                            <input name="address" type="text" class="single-input" required>
                                            <label>Adres</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <select id="city" name="city" class="single-select" required>
                                                <option value="">Şehir Seçiniz</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->city }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <select id="county" name="county" class="single-select" required>
                                                <option value="">İlçe Seçiniz</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="zip_code" type="text" class="single-input" required>
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
                                        <button type="submit" class="btn btn-green">Şimdi Öde</a>
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
    <script src="{{ asset('assets\js\jquery-2.2.4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#city").change(function() {
                event.preventDefault();

                var cityId = $("#city").val();
                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    url: "/api/city-counties/" + cityId,
                    data: {
                        _token: _token
                    },
                    type: "GET",
                    success: function(response) {
                        var options = '';

                        $.each(response, function(key, value) {
                            options += '<option value="' + value.id +
                                '">' + value.county + '</option>';
                        });

                        $("#county").empty().append(options).niceSelect('update');
                    },
                    error: function(err) {
                        Swal.fire({
                            title: 'Ajax error',
                            html: `Ajax servisi yanıt veremedi, lütfen tekrar deneyiniz.`,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                });
            });

        });
    </script>
@endsection
