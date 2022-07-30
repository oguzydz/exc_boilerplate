@extends('layouts.shop.payment')
@section('title', 'Dijital Lisans Ürünleri | Ucuz Stok Görsel - Exxefy')
{{-- @section('description', 'ExxeStock - Uygun Fiyatlarla Stock Ürünleri') --}}


@section('content')
    <div class="checkout-page-area pd-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="checkout-form-wrap">
                        @if ($errors->any())
                            <div class="checkout-error">
                                <div class="row">
                                    <div class="col-md-9">
                                        <p class="description text-danger">
                                            Siparişinizi tamamlamak için lütfen aşağıdaki hataları düzeltiniz.
                                        </p>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="description text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-3 m-auto">
                                        <img src="{{ asset('assets/img/icons/cross.svg') }}" class="img">
                                    </div>
                                </div>
                            </div>
                        @endif
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
                            <form class="exxefy-form-wrap" method="POST"
                                action="{{ route($company->slug . '.payment.payment') }}">
                                @csrf
                                <div class="row custom-gutters-20">
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="name" type="text" value="{{ old('name') }}"
                                                class="single-input" required>
                                            <label class="{{ old('name') ? 'active' : '' }}">Adınız</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="surname" type="text" value="{{ old('surname') }}"
                                                class="single-input" required>
                                            <label class="{{ old('surname') ? 'active' : '' }}">Soyadınız</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="email" type="email" value="{{ old('email') }}"
                                                class="single-input" required>
                                            <label class="{{ old('email') ? 'active' : '' }}">E-Posta</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="phone" type="number" value="{{ old('phone') }}"
                                                class="single-input" required>
                                            <label class="{{ old('phone') ? 'active' : '' }}">Telefon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-input-wrap">
                                            <input name="address" type="text" value="{{ old('address') }}"
                                                class="single-input" required>
                                            <label class="{{ old('address') ? 'active' : '' }}">Adres</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <select id="city" name="city" onchange="getCounties()" class="single-select"
                                                required>
                                                <option value="">İl Seçiniz</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ old('city') == $city->id ? 'selected' : '' }}>
                                                        {{ $city->city }}</option>
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
                                            <input name="zipCode" type="number" value="{{ old('zipCode') }}"
                                                class="single-input" required>
                                            <label class="{{ old('zipCode') ? 'active' : '' }}">Posta Kodu</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="identityNumber" type="number"
                                                value="{{ old('identityNumber') }}" maxlength="11" class="single-input"
                                                required>
                                            <label class="{{ old('identityNumber') ? 'active' : '' }}">Tc Kimlik
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-input-wrap">
                                            <input name="note" type="text" value="{{ old('note') }}"
                                                class="single-input">
                                            <label class="{{ old('note') ? 'active' : '' }}">Satıcıya Not (Zorunlu
                                                değil)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 padding-top-50">
                                        <div class="checkout-title">
                                            <h6>Ödeme Bilgileri</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-input-wrap">
                                            <input name="cardNumber" id="cardNumber" type="tel"
                                                value="{{ old('cardNumber') }}" class="single-input"
                                                autocomplete="cc-number" required>
                                            <label class="{{ old('cardNumber') ? 'active' : '' }}">16 Haneli Kart
                                                Numarası</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-wrap">
                                            <input name="cardName" type="text" value="{{ old('cardName') }}"
                                                class="single-input" autocomplete="cc-name" required>
                                            <label class="{{ old('cardName') ? 'active' : '' }}">Kart Üzerindeki
                                                Ad-Soyad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="single-input-wrap">
                                            <input name="cardExpires" id="cardExpires" type="tel"
                                                value="{{ old('cardExpires') }}" class="single-input"
                                                autocomplete="cc-exp" required>
                                            <label class="{{ old('cardExpires') ? 'active' : '' }}">Son Kul.
                                                Tarihi</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="single-input-wrap">
                                            <input name="cardSecurityCode" id="cardSecurityCode" type="number"
                                                value="{{ old('cardSecurityCode') }}" class="single-input"
                                                autocomplete="cc-csc" maxlength="4" required>
                                            <label class="{{ old('cardSecurityCode') ? 'active' : '' }}">Güvenlik
                                                Kodu</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <span class="inline-svg scale-image-secure-badge">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="131" height="37"
                                                viewBox="0 0 131 37">
                                                <g fill="none" fill-rule="evenodd">
                                                    <path fill="#4A4A4A"
                                                        d="M36.07 10.06c-.52 0-1.0183-.0833-1.495-.25-.4767-.1667-.845-.3867-1.105-.66l.29-.57c.2533.2533.59.4583 1.01.615.42.1567.8533.235 1.3.235.6267 0 1.0967-.115 1.41-.345.3133-.23.47-.5283.47-.895 0-.28-.085-.5033-.255-.67-.17-.1667-.3783-.295-.625-.385-.2467-.09-.59-.1883-1.03-.295-.5267-.1333-.9467-.2617-1.26-.385-.3133-.1233-.5817-.3117-.805-.565-.2233-.2533-.335-.5967-.335-1.03 0-.3533.0933-.675.28-.965.1867-.29.4733-.5217.86-.695.3867-.1733.8667-.26 1.44-.26.4 0 .7917.055 1.175.165.3833.11.715.2617.995.455l-.25.59c-.2933-.1933-.6067-.3383-.94-.435-.3333-.0967-.66-.145-.98-.145-.6133 0-1.075.1183-1.385.355-.31.2367-.465.5417-.465.915 0 .28.085.505.255.675.17.17.3833.3.64.39.2567.09.6017.1883 1.035.295.5133.1267.9283.2517 1.245.375.3167.1233.585.31.805.56.22.25.33.5883.33 1.015 0 .3533-.095.675-.285.965-.19.29-.4817.52-.875.69-.3933.17-.8767.255-1.45.255zm9.17-.7V10h-4.95V3h4.8v.64h-4.06v2.49h3.62v.63h-3.62v2.6h4.21zm4.74.7c-.6933 0-1.3183-.1533-1.875-.46-.5567-.3067-.9933-.7317-1.31-1.275-.3167-.5433-.475-1.1517-.475-1.825s.1583-1.2817.475-1.825c.3167-.5433.755-.9683 1.315-1.275.56-.3067 1.1867-.46 1.88-.46.52 0 1 .0867 1.44.26.44.1733.8133.4267 1.12.76l-.47.47c-.5467-.5533-1.2367-.83-2.07-.83-.5533 0-1.0567.1267-1.51.38-.4533.2533-.8083.6-1.065 1.04-.2567.44-.385.9333-.385 1.48s.1283 1.04.385 1.48c.2567.44.6117.7867 1.065 1.04.4533.2533.9567.38 1.51.38.84 0 1.53-.28 2.07-.84l.47.47c-.3067.3333-.6817.5883-1.125.765-.4433.1767-.925.265-1.445.265zm6.95 0c-.9067 0-1.6133-.26-2.12-.78-.5067-.52-.76-1.2767-.76-2.27V3h.74v3.98c0 .8133.1833 1.42.55 1.82.3667.4.8967.6 1.59.6.7 0 1.2333-.2 1.6-.6.3667-.4.55-1.0067.55-1.82V3h.72v4.01c0 .9933-.2517 1.75-.755 2.27-.5033.52-1.2083.78-2.115.78zm9.88-.06l-1.6-2.25c-.18.02-.3667.03-.56.03h-1.88V10h-.74V3h2.62c.8933 0 1.5933.2133 2.1.64.5067.4267.76 1.0133.76 1.76 0 .5467-.1383 1.0083-.415 1.385-.2767.3767-.6717.6483-1.185.815l1.71 2.4h-.81zm-2.18-2.85c.6933 0 1.2233-.1533 1.59-.46.3667-.3067.55-.7367.55-1.29 0-.5667-.1833-1.0017-.55-1.305-.3667-.3033-.8967-.455-1.59-.455h-1.86v3.51h1.86zm9.58 2.21V10h-4.95V3h4.8v.64H70v2.49h3.62v.63H70v2.6h4.21zM81.19 3c.8933 0 1.5933.2133 2.1.64.5067.4267.76 1.0133.76 1.76 0 .7467-.2533 1.3317-.76 1.755-.5067.4233-1.2067.635-2.1.635h-1.88V10h-.74V3h2.62zm-.02 4.14c.6933 0 1.2233-.1517 1.59-.455s.55-.7317.55-1.285c0-.5667-.1833-1.0017-.55-1.305-.3667-.3033-.8967-.455-1.59-.455h-1.86v3.5h1.86zm8.52.99h-3.9L84.95 10h-.77l3.2-7h.73l3.2 7h-.78l-.84-1.87zm-.27-.6l-1.68-3.76-1.68 3.76h3.36zm5.04.05V10h-.73V7.58L90.93 3h.79l2.4 3.93L96.52 3h.74l-2.8 4.58zM105.53 3v7h-.71V4.4l-2.75 4.71h-.35l-2.75-4.68V10h-.71V3h.61l3.04 5.19L104.92 3h.61zm7.23 6.36V10h-4.95V3h4.8v.64h-4.06v2.49h3.62v.63h-3.62v2.6h4.21zM120.35 3v7h-.61l-4.5-5.68V10h-.74V3h.61l4.51 5.68V3h.73zm3.64.64h-2.46V3h5.66v.64h-2.46V10h-.74V3.64z">
                                                    </path>
                                                    <g stroke="#AFBCCE" stroke-width="1.6">
                                                        <path d="M4 17V9.2418C4 4.7088 7.6 1 12 1s8 3.7088 8 8.2418V17">
                                                        </path>
                                                        <path
                                                            d="M12 27v3m0 6C5.925 36 1 31.075 1 25s4.925-11 11-11 11 4.925 11 11-4.925 11-11 11zm0-9c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z"
                                                            stroke-linecap="square"></path>
                                                    </g>
                                                    <path fill="#52CBB0"
                                                        d="M42.54 30.848V32h-8.838v-.918l5.238-5.13c.66-.648 1.107-1.209 1.341-1.683.234-.474.351-.951.351-1.431 0-.744-.255-1.323-.765-1.737-.51-.414-1.239-.621-2.187-.621-1.476 0-2.622.468-3.438 1.404l-.918-.792c.492-.576 1.119-1.02 1.881-1.332.762-.312 1.623-.468 2.583-.468 1.284 0 2.301.303 3.051.909.75.606 1.125 1.437 1.125 2.493 0 .648-.144 1.272-.432 1.872-.288.6-.834 1.29-1.638 2.07l-4.284 4.212h6.93zm4.932-6.282c1.824 0 3.153.327 3.987.981.834.654 1.251 1.569 1.251 2.745 0 .732-.171 1.386-.513 1.962-.342.576-.855 1.029-1.539 1.359-.684.33-1.524.495-2.52.495-.9 0-1.755-.147-2.565-.441-.81-.294-1.461-.687-1.953-1.179l.63-1.026c.42.432.972.783 1.656 1.053.684.27 1.422.405 2.214.405 1.044 0 1.851-.234 2.421-.702.57-.468.855-1.092.855-1.872 0-.864-.321-1.518-.963-1.962-.642-.444-1.725-.666-3.249-.666h-2.682l.648-6.318h6.894v1.152h-5.76l-.432 4.014h1.62zm12.096-.108c.828 0 1.563.156 2.205.468.642.312 1.143.753 1.503 1.323.36.57.54 1.233.54 1.989 0 .768-.186 1.446-.558 2.034-.372.588-.885 1.041-1.539 1.359-.654.318-1.389.477-2.205.477-1.668 0-2.946-.549-3.834-1.647-.888-1.098-1.332-2.649-1.332-4.653 0-1.404.24-2.592.72-3.564s1.152-1.707 2.016-2.205c.864-.498 1.872-.747 3.024-.747 1.248 0 2.244.228 2.988.684l-.522 1.044c-.6-.396-1.416-.594-2.448-.594-1.392 0-2.484.441-3.276 1.323-.792.882-1.188 2.163-1.188 3.843 0 .3.018.642.054 1.026.312-.684.81-1.215 1.494-1.593.684-.378 1.47-.567 2.358-.567zm-.108 6.552c.912 0 1.653-.249 2.223-.747.57-.498.855-1.161.855-1.989 0-.828-.285-1.488-.855-1.98-.57-.492-1.341-.738-2.313-.738-.636 0-1.197.12-1.683.36s-.867.57-1.143.99c-.276.42-.414.888-.414 1.404 0 .48.129.924.387 1.332.258.408.639.738 1.143.99s1.104.378 1.8.378zm16.29-8.55c.888 0 1.692.201 2.412.603.72.402 1.284.969 1.692 1.701.408.732.612 1.566.612 2.502 0 .936-.204 1.77-.612 2.502-.408.732-.972 1.302-1.692 1.71-.72.408-1.524.612-2.412.612-.792 0-1.503-.168-2.133-.504-.63-.336-1.137-.822-1.521-1.458V32h-1.224V18.644h1.278v5.688c.396-.612.903-1.077 1.521-1.395.618-.318 1.311-.477 2.079-.477zm-.09 8.496c.66 0 1.26-.153 1.8-.459.54-.306.963-.741 1.269-1.305.306-.564.459-1.206.459-1.926s-.153-1.362-.459-1.926c-.306-.564-.729-.999-1.269-1.305-.54-.306-1.14-.459-1.8-.459-.672 0-1.275.153-1.809.459-.534.306-.954.741-1.26 1.305-.306.564-.459 1.206-.459 1.926s.153 1.362.459 1.926c.306.564.726.999 1.26 1.305.534.306 1.137.459 1.809.459zm7.416-8.424h1.278V32h-1.278v-9.468zm.648-2.07c-.264 0-.486-.09-.666-.27-.18-.18-.27-.396-.27-.648 0-.24.09-.45.27-.63.18-.18.402-.27.666-.27s.486.087.666.261c.18.174.27.381.27.621 0 .264-.09.486-.27.666-.18.18-.402.27-.666.27zm9.18 10.962c-.24.216-.537.381-.891.495-.354.114-.723.171-1.107.171-.888 0-1.572-.24-2.052-.72s-.72-1.158-.72-2.034v-5.724h-1.692v-1.08h1.692v-2.07h1.278v2.07h2.88v1.08h-2.88v5.652c0 .564.141.993.423 1.287.282.294.687.441 1.215.441.264 0 .519-.042.765-.126.246-.084.459-.204.639-.36l.45.918zm10.782.684c-.936 0-1.833-.15-2.691-.45-.858-.3-1.521-.696-1.989-1.188l.522-1.026c.456.456 1.062.825 1.818 1.107.756.282 1.536.423 2.34.423 1.128 0 1.974-.207 2.538-.621.564-.414.846-.951.846-1.611 0-.504-.153-.906-.459-1.206-.306-.3-.681-.531-1.125-.693-.444-.162-1.062-.339-1.854-.531-.948-.24-1.704-.471-2.268-.693-.564-.222-1.047-.561-1.449-1.017-.402-.456-.603-1.074-.603-1.854 0-.636.168-1.215.504-1.737.336-.522.852-.939 1.548-1.251.696-.312 1.56-.468 2.592-.468.72 0 1.425.099 2.115.297.69.198 1.287.471 1.791.819l-.45 1.062c-.528-.348-1.092-.609-1.692-.783-.6-.174-1.188-.261-1.764-.261-1.104 0-1.935.213-2.493.639-.558.426-.837.975-.837 1.647 0 .504.153.909.459 1.215.306.306.69.54 1.152.702.462.162 1.083.339 1.863.531.924.228 1.671.453 2.241.675.57.222 1.053.558 1.449 1.008.396.45.594 1.059.594 1.827 0 .636-.171 1.215-.513 1.737-.342.522-.867.936-1.575 1.242-.708.306-1.578.459-2.61.459zm11.07 0c-.936 0-1.833-.15-2.691-.45-.858-.3-1.521-.696-1.989-1.188l.522-1.026c.456.456 1.062.825 1.818 1.107.756.282 1.536.423 2.34.423 1.128 0 1.974-.207 2.538-.621.564-.414.846-.951.846-1.611 0-.504-.153-.906-.459-1.206-.306-.3-.681-.531-1.125-.693-.444-.162-1.062-.339-1.854-.531-.948-.24-1.704-.471-2.268-.693-.564-.222-1.047-.561-1.449-1.017-.402-.456-.603-1.074-.603-1.854 0-.636.168-1.215.504-1.737.336-.522.852-.939 1.548-1.251.696-.312 1.56-.468 2.592-.468.72 0 1.425.099 2.115.297.69.198 1.287.471 1.791.819l-.45 1.062c-.528-.348-1.092-.609-1.692-.783-.6-.174-1.188-.261-1.764-.261-1.104 0-1.935.213-2.493.639-.558.426-.837.975-.837 1.647 0 .504.153.909.459 1.215.306.306.69.54 1.152.702.462.162 1.083.339 1.863.531.924.228 1.671.453 2.241.675.57.222 1.053.558 1.449 1.008.396.45.594 1.059.594 1.827 0 .636-.171 1.215-.513 1.737-.342.522-.867.936-1.575 1.242-.708.306-1.578.459-2.61.459zm7.596-12.708h1.332v11.448h7.056V32h-8.388V19.4z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span>

                                        <img src="{{ asset('assets\img\footer/footer_logo-2.png') }}"
                                            class="float-right" alt="img">
                                    </div>
                                    <div class="col-12 payment-description">
                                        <span class="d-block check-box-area mt-3">
                                            <input id="1checkbox" type="checkbox" name="kvkk" required>
                                            <label for="1checkbox">
                                                Ön Bilgilendirme Formu'nu ve Mesafeli Satış Sözleşmesi'ni onaylıyorum.
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
                                                            <img src="/storage/{{ $cart->options->image }}" alt="img">
                                                        </div>
                                                        <div class="media-body">
                                                            <span>{{ $cart->name }}</span>
                                                            <p>Adet: {{ $cart->qty }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart-product-price text-center">
                                                    {{ $company::getFormattedNumber($cart->price * $cart->qty, 'pt_BR')}} TL</td>
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
                                                class="woocommerce-Price-currencySymbol"></span>{{ Cart::subtotal() }}
                                            TL</span>
                                    </div>
                                    <div class="charge pt-0">
                                        <span>Kargo Ücreti:</span>
                                        <span class="amount float-right"><span
                                                class="woocommerce-Price-currencySymbol"></span>{{ $company->cargoPrice(true) }}
                                            TL</span>
                                    </div>
                                    <div class="total-amount">
                                        <span>Genel Toplam:</span>
                                        <span
                                            class="amount float-right font-weight-bold">{{ $company::getFormattedNumber(Cart::total(null, '.', '') + $company->cargoPrice(), 'pt_BR') }}
                                            TL</span>
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
        $(document).ready(function($) {
            if ($("#city").val()) {
                getCounties({{ old('county') }})
            }
        });
    </script>
@endsection
