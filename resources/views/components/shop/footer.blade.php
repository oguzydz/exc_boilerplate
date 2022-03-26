<div class="newsletter-area mg-top-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-10 text-center">
                <div class="section-title">
                    <h2 class="title">İndirimlerden <span>Haberdar Ol!</span></h2>
                    <p>Haber bültenine kayıt olarak, mağazamızın tüm indirimlerinden ve kampanyalarından haberdar olabilirsiniz!</p>
                </div>
                <div class="newsletter-subcribe">
                    <form id="news-subcribeform" class="subcribe-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="E-Posta" name="mail" required="">
                            <button type="submit" class="btn-green subcribe-submit">Kayıt Ol!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer-area mg-top-120" style="background-image:url({{ asset('assets/img/bg/footer.png') }});">
    <div class="footer-top pd-top-120 padding-bottom-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-11">
                    <div class="footer-widget widget text-center">
                        <div class="footer_top_widget">
                            <a href="{{ route("$company->slug.index") }}" class="footer-logo">
                                <img src="/storage/{{ $company->logo }}" alt="footer logo">
                            </a>
                            <p>{{ $company->text }}</p>
                        </div>
                    </div>
                    <div class="footer-widget widget widget_nav_menu text-center">
                        <ul>
                            <li><a href="{{ route($company->slug . '.index') }}">Anasayfa</a></li>
                            <li><a href="{{ route($company->slug . '.category.index') }}">Kategoriler</a></li>
                            <li><a href="{{ route($company->slug . '.cargoTracking.index') }}">Sipariş Takibi</a></li>
                            <li><a href="{{ route($company->slug . '.contact.index') }}">İletişim</a></li>
                            <li><a href="#">KVKK</a></li>
                        </ul>
                    </div>
                    <div class="container text-center">
                        <img src="{{asset('assets/img/footer/footer_logo-2.png')}}" alt="Ödeme Yöntemlerimiz">
                    </div>
                    <div class="copyright-inner">
                        <div class="row custom-gutters-16">
                            <div class="col-lg-7">
                                <div class="copyright-text">
                                    © <a href="{{ route("$company->slug.index") }}">{{ $company->title }}</a> - Tüm Hakları Saklıdır! ve <a href="{{ route("$company->slug.index") }}">{{ $company->title }}</a> bir <a href="{{ route('home') }}" target="_blank"><i class="fa fa-heart"></i><span>Exxefy</span></a> mağazasıdır.
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <ul class="social-icon text-right">
                                    <li>
                                        <a class="dribbble" href="#"><i class="fa fa-dribbble  "></i></a>
                                    </li>
                                    <li>
                                        <a class="facebook" href="#" target="_blank"><i class="fa fa-facebook  "></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#" target="_blank"><i class="fa fa-twitter  "></i></a>
                                    </li>
                                    <li>
                                        <a class="linkedin" href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a class="pinterest" href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
