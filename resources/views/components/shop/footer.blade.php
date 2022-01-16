<div class="faq-area pd-top-105">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-11">
                <div class="section-title style-five text-center">
                    <h2 class="title">Sıkça Sorulan <span>Sorular</span></h2>
                    <p class="sub-title"><span>Aradığın cevabı bulamadın mı?</span><br> Bize canlı destek veya yandaki numarayı arayak ulaşabilirsiniz. 0 (850) 111 11 11 veya destek@exxefy.com</p>
                </div>
                <div class="accordion style-two accordion-h-five" id="accordion">
                    <!-- single accordion -->
                    <div class="single-accordion card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Exxefy ne işe yarar?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Exxefy: kendi özelleştirilmiş mağazanızdan kolayca satış yapıp ödeme almanızı sağlar. Exxefy üzerinden yapılan alışveriş müşterilerinize
                                en güzel deneyimi ve güvenli alışverişi sağlar.
                            </div>
                        </div>
                    </div>
                    <!-- single accordion -->
                    <div class="single-accordion card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOneP" aria-expanded="true" aria-controls="collapseOneP">
                                    Kendi alan adım olacak mı?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOneP" class="collapse" aria-labelledby="headingOneP" data-parent="#accordion">
                            <div class="card-body">
                                Evet! Mağazanızın adıyla uyumlu ve sadece size özel bir url'niz olacak. Örneğin: exxefy.com/edabutik
                            </div>
                        </div>
                    </div>
                    <!-- single accordion -->
                    <div class="single-accordion card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                    Üyelik ücreti veya listeleme ücreti var mı?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Kesinlikle yok, exxefy'a ücretsiz kayıt olabilir ve dilediğiniz kadar ürün ekleyebilirsiniz. Ücretlendirme yalnızca başarılı satışlarınızdan
                                kesilen %2,95 değerindeki komisyondan alınmaktadır.
                            </div>
                        </div>
                    </div>
                    <!-- single accordion -->
                    <div class="single-accordion card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                    Sistemden satışlarımı ve müşterilerimi yönetebilir miyim?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Exxefy üzerinden açtığınız mağazanıza gelen tüm siparişleri, iadeleri, kargolamaları gelişmiş
                                yönetim panelinizden görüntüleyebilir ve üzerinde işlem yapabilirsiniz.
                            </div>
                        </div>
                    </div>
                    <!-- single accordion -->
                    <div class="single-accordion card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                                    Müşterilerime e-posta, mesaj, bildirim gönderebilir miyim?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                Exxefy mağaza paneliniz üzerinden müşterilerinize ister toplu ister seçerek kampanya mesajları gönderebilir, ayrıca destek sistemiyle
                                sorularını da yanıtlayabilirsiniz.
                            </div>
                        </div>
                    </div>
                    <!-- single accordion end -->
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer-area mg-top-120" style="background-image:url(assets/img/bg/footer.png);">
    <div class="footer-top pd-top-120 padding-bottom-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-11">
                    <div class="footer-widget widget text-center">
                        <div class="footer_top_widget">
                            <a href="{{ route('company.index.' . $company->slug) }}" class="footer-logo">
                                <img src="/storage/{{ $company->logo }}" alt="footer logo">
                            </a>
                            <p>{{ $company->text }}</p>
                        </div>
                    </div>
                    <div class="footer-widget widget widget_nav_menu text-center">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="pricing.html">Price</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="#">Pages</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <div class="copyright-inner">
                        <div class="row custom-gutters-16">
                            <div class="col-lg-7">
                                <div class="copyright-text">
                                    © <a href="{{ route('company.index.' . $company->slug) }}">{{ $company->title }}</a> Tüm Hakları Saklıdır! Ve <a href="{{ route('company.index.' . $company->slug) }}">{{ $company->title }}</a> bir <a href="http://zwin.io/" target="_blank"><i class="fa fa-heart"></i><span>Exxefy</span></a> mağazasıdır.
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
