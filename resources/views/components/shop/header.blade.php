<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<div class="body-overlay" id="body-overlay"></div>
<div class="search-popup" id="search-popup">
    <form action="index.html" class="search-form">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Mağazada arama yap...">
        </div>
        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
    </form>
</div>

<!-- //. cart Popup -->
<div class="cart-popup" id="cart-popup">
    <div class="order-table table-responsive">
        <div class="checkout-title text-center mb-0">
            <h6>Sepetiniz</h6>
        </div>
        <table class="table">
            <tbody id="cart-modal-products">
                @if (count(Cart::content()))
                    @foreach (Cart::content() as $cart)
                        <tr>
                            <td>
                                <div class="media single-cart-product">
                                    <div class="media-left">
                                        <img src="/storage/{{ $cart->options->image }}" style="width: 90px;"
                                            alt="img">
                                    </div>
                                    <div class="media-body">
                                        <a
                                            href="{{ route($company->slug . '.product.show', [$cart->options->slug]) }}">
                                            <span>{{ $cart->name }}</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="cart-product-price text-center">
                                {{ $company::getFormattedNumber($cart->price, 'pt_BR') }} TL</td>
                            <td class="text-center">
                                <div class="quantity-wrap">
                                    <div class="quantity">
                                        <input type="number" step="1" min="0" max="100" value="{{ $cart->qty }}"
                                            title="Qty" class="input-text qty text">
                                        <a class="inc qty-button"
                                            onclick="updateCartQuantity('{{ $cart->rowId }}', 'plus', {{ $cart->qty }}); return false">+</a>
                                        <a class="dec qty-button"
                                            onclick="updateCartQuantity('{{ $cart->rowId }}', 'minus', {{ $cart->qty }}); return false">-</a>
                                    </div>
                                </div>
                            </td>
                            <td class="cart-product-price text-center">
                                {{ $company::getFormattedNumber($cart->price * $cart->qty, 'pt_BR') }} TL</td>
                            <td class="text-center">
                                <div class="cart-close">
                                    <span onclick="removeFromCart('{{ $cart->rowId }}'); return false"
                                        class="ti-close"></span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Sepetinizde henüz ürün bulunamadı.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="total-shapping-area-wrap">
            <div class="total-shapping-area">
                <div class="total-amount">
                    <span>Ara Toplam:</span>
                    <span class="amount float-right">
                        <span id="cart-modal-sub-total">{{ Cart::SubTotal() }}</span>
                        <span class="woocommerce-Price-currencySymbol"> TL</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="btn-wrapper text-center pd-top-170">
            <a class="btn btn-green" href="{{ route("$company->slug.payment.checkout") }}">Ödeme Yap</a>
        </div>
    </div>
</div>
<!-- //. cart Popup -->

<nav class="navbar navbar-area navbar-expand-lg nav-style-01 bg-white">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper mobile-logo">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets\img\exxefy-logo.png') }}" width="90px" alt="logo">
                </a>
            </div>
            <div class="nav-right-content">
                <ul>
                    <li class="search">
                        <i class="ti-search"></i>
                    </li>
                    <li class="cart">
                        <div class="cart-icon"><i class="la la-shopping-cart"></i></div>
                        <div class="widget_shopping_cart_content">
                            <ul id="cart-products-m">
                                @if (count(Cart::content()))
                                    @foreach (Cart::content() as $cart)
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="/storage/{{ $cart->options->image }}"
                                                        style="width: 90px;" alt="img">
                                                </div>
                                                <div class="media-body">
                                                    <a class="title"
                                                        href="{{ route($company->slug . '.product.show', [$cart->options->slug]) }}">{{ $cart->name }}</a>
                                                    <p>Adet: {{ $cart->qty }}</p>
                                                    <span
                                                        class="price">{{ $company::getFormattedNumber($cart->price * $cart->qty, 'pt_BR') }}
                                                        TL</span>
                                                </div>
                                            </div>
                                            <a class="remove-product"
                                                onclick="removeFromCart('{{ $cart->rowId }}'); return false"
                                                href="#"><span class="ti-close"></span></a>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        Sepetinizde henüz ürün bulunamadı.
                                    </li>
                                @endif
                            </ul>
                            <p class="total">
                                <strong>Ara Toplam:</strong>
                                <span class="amount">
                                    <span id="cart-sub-total">{{ Cart::subTotal() }}</span>
                                    <span class="woocommerce-Price-currencySymbol"> TL</span>
                                </span>
                            </p>
                            <p class="buttons">
                                <a href="#" class="button" id="cart-btn" onclick="return false;">Sepeti
                                    Görüntüle</a>
                                <a href="{{ route("$company->slug.payment.checkout") }}" class="button mt-2">Ödeme
                                    Yap</a>
                            </p>
                        </div>
                    </li>
                    <li class="notification">
                        <a href="#">
                            <i class="fa fa-heart-o"></i>
                            <span class="notification-count">0</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exxefy_main_menu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="exxefy_main_menu">
            <div class="logo-wrapper desktop-logo">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets\img\exxefy-logo.png') }}" width="130px" alt="logo">
                </a>
            </div>
            <ul class="navbar-nav">
                <li>
                    <a href="{{ route($company->slug . '.index') }}">Anasayfa</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route($company->slug . '.category.index') }}">Kategoriler</a>
                    <ul class="sub-menu">
                        @foreach ($company->activeCategories as $category)
                            <li>
                                <a
                                    href="{{ route($company->slug . '.category.show', [$category->slug]) }}">{{ $category->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route($company->slug . '.cargoTracking.index') }}">Sipariş Takibi</a>
                </li>
                <li>
                    <a href="{{ route($company->slug . '.contact.index') }}">İletişim</a>
                </li>
            </ul>
        </div>
        <div class="nav-right-content">
            <ul>
                <li class="search">
                    <i class="ti-search"></i>
                </li>
                <li class="cart">
                    <div class="cart-icon"><i class="la la-shopping-cart"></i></div>
                    <div class="widget_shopping_cart_content">
                        <ul id="cart-products">
                            @if (count(Cart::content()))
                                @foreach (Cart::content() as $cart)
                                    <li>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="/storage/{{ $cart->options->image }}" style="width: 90px;"
                                                    alt="img">
                                            </div>
                                            <div class="media-body">
                                                <a class="title"
                                                    href="{{ route($company->slug . '.product.show', [$cart->options->slug]) }}">{{ $cart->name }}</a>
                                                <p>Adet: {{ $cart->qty }}</p>
                                                <span
                                                    class="price">{{ $company::getFormattedNumber($cart->price * $cart->qty, 'pt_BR') }}
                                                    TL</span>
                                            </div>
                                        </div>
                                        <a class="remove-product"
                                            onclick="removeFromCart('{{ $cart->rowId }}'); return false"
                                            href="#"><span class="ti-close"></span></a>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    Sepetinizde henüz ürün bulunamadı.
                                </li>
                            @endif
                        </ul>
                        <p class="total">
                            <strong>Ara Toplam:</strong>
                            <span class="amount">
                                <span id="cart-sub-total">{{ Cart::subTotal() }}</span>
                                <span class="woocommerce-Price-currencySymbol"> TL</span>
                            </span>
                        </p>
                        <p class="buttons">
                            <a href="#" class="button" id="cart-btn" onclick="return false;">Sepeti
                                Görüntüle</a>
                            <a href="{{ route("$company->slug.payment.checkout") }}" class="button mt-2">Ödeme
                                Yap</a>
                        </p>
                    </div>
                </li>
                <li class="notification">
                    <a href="#">
                        <i class="fa fa-heart-o"></i>
                        <span class="notification-count">0</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if (Route::currentRouteName() === $company->slug . '.index')
    <div class="profile-page tx-13">
        <div class="grid-margin">
            <div class="profile-header">
                <div class="cover">
                    <div class="gray-shade"></div>
                    <figure style="background-image: url('/storage/{{ $company->bg_image }}')"></figure>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row cover-body justify-content-between align-items-center">
                                    <div class="col-md-8">
                                        <div class="row align-items-center">
                                            <div class="col-md-2 col-3 profile-pic"
                                                style="background-image: url('/storage/{{ $company->logo }}')">
                                                {{-- <img class="profile-pic" src="/storage/{{ $company->logo }}" alt="profile"> --}}
                                            </div>
                                            <div class="col-md-10 col-9">
                                                <span class="profile-name">
                                                    <a href="{{ route($company->slug . '.index') }}">
                                                        {{ $company->title }}
                                                    </a>

                                                </span>
                                                <p class="">
                                                    {{ $company->text }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block col-md-4 text-right">
                                        <a class="btn btn-green text-white" href="http://127.0.0.1:5421/register">Abone
                                            Ol!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-info text-center">
                                <p class="shop-info d-inline-block mr-2"><span><i class="fa fa-phone"></i></span>
                                    {{ $company->phone }}</p>
                                <p class="shop-info d-inline-block mr-2"><span><i class="fa fa-envelope"></i></span>
                                    {{ $company->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
@endif
