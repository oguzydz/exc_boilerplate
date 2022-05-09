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
                            <li><a href="{{ route('policy.index') }}" target="blank">Teslimat ve İade</a></li>
                            <li><a href="{{ route('policy.security') }}" target="blank">Gizlilik Politikası</a></li>
                            <li><a href="{{ route('policy.delivery') }}" target="blank">Ödeme Teslimat</a></li>
                            <li><a href="{{ route('policy.agreement') }}" target="blank">Üyelik Sözleşmesi</a></li>
                            <li><a href="{{ route('policy.sales') }}" target="blank">Satış Sözleşmesi</a></li>
                        </ul>
                    </div>
                    <div class="container text-center mb-5 ">
                        <img src="{{asset('assets/img/footer/footer_logo-2.png')}}" alt="Ödeme Yöntemlerimiz">
                    </div>
                    <div class="copyright-inner">

                        <div class="row custom-gutters-16">
                            <div class="col-lg-9">
                                <div class="copyright-text">
                                    © <a href="{{ route("$company->slug.index") }}">{{ $company->title }}</a> - Tüm Hakları Saklıdır! ve <a href="{{ route("$company->slug.index") }}">{{ $company->title }}</a> bir <a href="{{ route('home') }}" target="_blank"><i class="fa fa-heart"></i><span>Exxefy</span></a> mağazasıdır.
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <ul class="social-icon text-right">
                                    <li>
                                        <a class="facebook" href="{{ $company->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="{{ $company->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="pinterest" href="{{ $company->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
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
