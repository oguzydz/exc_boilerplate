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
        <div class="checkout-title text-center mb-0"><h6>Sepetiniz</h6></div>
        <table class="table">
            <tbody id="cart-modal-products">
                @if(count(Cart::content()))
                @foreach (Cart::content() as $cart)
                <tr>
                    <td>
                        <div class="media single-cart-product">
                            <div class="media-left">
                                <img src="/storage/{{ $cart->options->image }}" alt="img">
                            </div>
                            <div class="media-body">
                                <span>{{ $cart->name }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="cart-product-price text-center">₺{{ $cart->price }}</td>
                    <td class="text-center">
                        <div class="quantity-wrap">
                            <div class="quantity">
                                <input type="number" step="1" min="0" max="100" value="1" title="Qty" class="input-text qty text">
                            </div>
                        </div>
                    </td>
                    <td class="cart-product-price text-center">₺{{ $cart->price * $cart->qty }}</td>
                    <td class="text-center">
                        <div class="cart-close">
                            <span onclick="removeFromCart('{{ $cart->rowId }}'); return false" class="ti-close"></span>
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
                    <span class="amount float-right" id="cart-modal-sub-total"><span class="woocommerce-Price-currencySymbol">₺</span>{{ Cart::total() }}</span>
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
                            <ul id="cart-productsx">
                                @if(count(Cart::content()))
                                    @foreach (Cart::content() as $cart)
                                    <li>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="/storage/{{ $cart->options->image }}" alt="img">
                                            </div>
                                            <div class="media-body">
                                                <a class="title" href="#">{{ $cart->name }}</a>
                                                <p>Adet: {{ $cart->qty }}</p>
                                                <span class="price">₺{{ $cart->price * $cart->qty }}</span>
                                            </div>
                                        </div>
                                        <a class="remove-product" onclick="removeFromCart('{{ $cart->rowId }}'); return false" href="#"><span class="ti-close"></span></a>
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
                                    <span class="woocommerce-Price-currencySymbol">₺</span>{{ Cart::total() }}
                                </span>
                            </p>
                            <p class="buttons">
                                <a href="{{ route("$company->slug.index") }}" class="button">Sepeti Görüntüle &amp; Ödeme Yap</a>
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
                    <img src="{{ asset('assets\img\exxefy-logo.png') }}" width="150px" alt="logo">
                </a>
            </div>
            <ul class="navbar-nav">
                <li>
                    <a href="#">Anasayfa</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Kategoriler</a>
                    <ul class="sub-menu">
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop-grid.html">Shop Grid</a></li>
                        <li><a href="shop-details.html">Shop Details</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-grid.html">Blog Grid</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">İletişim</a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About</a></li>
                        <li><a href="service.html">Service</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="offer.html">Offer</a></li>
                        <li><a href="error.html">Error 404</a></li>
                        <li><a href="comming-soon.html">Coming Soon</a></li>
                        <li><a href="work-processing.html">Work Processing</a></li>
                    </ul>
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
                            @if(count(Cart::content()))
                                @foreach (Cart::content() as $cart)
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="/storage/{{ $cart->options->image }}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <a class="title" href="#">{{ $cart->name }}</a>
                                            <p>Adet: {{ $cart->qty }}</p>
                                            <span class="price">₺{{ $cart->price * $cart->qty }}</span>
                                        </div>
                                    </div>
                                    <a class="remove-product" onclick="removeFromCart('{{ $cart->rowId }}'); return false" href="#"><span class="ti-close"></span></a>
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
                                <span class="woocommerce-Price-currencySymbol">₺</span><span id="cart-sub-total">{{ Cart::total() }}</span>
                            </span>
                        </p>
                        <p class="buttons">
                            <a href="#" class="button" id="cart-btn" onclick="return false;">Sepeti Görüntüle</a>
                            <a href="{{ route("$company->slug.payment.checkout") }}" class="button mt-2">Ödeme Yap</a>
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

@if (Route::currentRouteName() !== $company->slug . '.payment.checkout' &&
     Route::currentRouteName() !== $company->slug . '.show')
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
                                            <div class="col-md-2 col-3">
                                                <img class="profile-pic" src="/storage/{{ $company->logo }}" alt="profile">
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
                                <p class="shop-info d-inline-block mr-2"><span><i class="fa fa-phone"></i></span> {{ $company->phone }}</p>
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
@endif

