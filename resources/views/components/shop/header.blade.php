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
                            <ul>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="assets/img/checkout/7.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <a class="title" href="#">Smart watch red color</a>
                                            <p>Quantity: 1</p>
                                            <span class="price">$150.00</span>
                                        </div>
                                    </div>
                                    <a class="remove-product" href="#"><span class="ti-close"></span></a>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="assets/img/checkout/8.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <a class="title" href="#">Smart watch red color</a>
                                            <p>Quantity: 1</p>
                                            <span class="price">$150.00</span>
                                        </div>
                                    </div>
                                    <a class="remove-product" href="#"><span class="ti-close"></span></a>
                                </li>
                            </ul>
                            <p class="total">
                                <strong>Subtotal:</strong>
                                <span class="amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>129.00
                                </span>
                            </p>
                            <p class="buttons">
                                <a href="checkout.html" class="button">View Card &amp; Check out</a>
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
                        <ul>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="assets/img/checkout/7.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <a class="title" href="#">Smart watch red color</a>
                                        <p>Quantity: 1</p>
                                        <span class="price">$150.00</span>
                                    </div>
                                </div>
                                <a class="remove-product" href="#"><span class="ti-close"></span></a>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="assets/img/checkout/8.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <a class="title" href="#">Smart watch red color</a>
                                        <p>Quantity: 1</p>
                                        <span class="price">$150.00</span>
                                    </div>
                                </div>
                                <a class="remove-product" href="#"><span class="ti-close"></span></a>
                            </li>
                        </ul>
                        <p class="total">
                            <strong>Subtotal:</strong>
                            <span class="amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>129.00
                            </span>
                        </p>
                        <p class="buttons">
                            <a href="checkout.html" class="button">View Card &amp; Check out</a>
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
                                            <img class="profile-pic"
                                                src="/storage/{{ $company->logo }}" alt="profile">
                                        </div>
                                        <div class="col-md-10 col-9">
                                            <span class="profile-name">{{ $company->title }}</span>
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
