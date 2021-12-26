<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>

<nav class="navbar navbar-area navbar-expand-lg nav-style-01">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper mobile-logo">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets\img\exxefy-logo.png') }}" width="150px" alt="logo">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exxefy_main_menu" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a href="#">Hemen Başla</a>
                    <ul class="sub-menu">
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop-grid.html">Shop Grid</a></li>
                        <li><a href="shop-details.html">Shop Details</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Fiyatlandırma</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-grid.html">Blog Grid</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
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
                <li>
                    <a href="{{ route('login') }}">Giriş Yap</a>
                </li>
                <li>
                    <a class="btn btn-green text-white" href="{{ route('register') }}">Ücretsiz Kayıt Ol</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
