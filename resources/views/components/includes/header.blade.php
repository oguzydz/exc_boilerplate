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
                    <a href="{{ route('home') }}">Anasayfa</a>
                </li>
                <li>
                    <a href="{{ route('startNow') }}">Hemen Başla</a>
                </li>
                <li>
                    <a href="{{ route('pricing') }}">Fiyatlandırma</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">İletişim</a>
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
