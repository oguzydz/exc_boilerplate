@extends('layouts.web')
@section('title', 'İletişim - Exxestock')


@section('content')

    <x-pageTitle title="İletişim" />

    <div class="contact_us_area section-padding-100-0" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <div class="sect-icon justify-content-center fadeInUp" data-wow-delay="0.2s">
                            <img src="img/svg/section-icon-5.svg" alt="">
                        </div>
                        <h2 class="fadeInUp" data-wow-delay="0.3s">Bizimle İletişime Geç!</h2>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact_form">
                        <form action="{{ route('contact.send') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <div id="success_fail_info"></div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="group fadeInUp" data-wow-delay="0.2s">
                                        <input type="text" name="name" id="name" required="">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>İsim</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group fadeInUp" data-wow-delay="0.3s">
                                        <input type="text" name="email" id="email" required="">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group fadeInUp" data-wow-delay="0.4s">
                                        <input type="text" name="text" id="subject" required="">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Konu</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group fadeInUp" data-wow-delay="0.5s">
                                        <textarea name="message" id="message" required=""></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Mesaj</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center fadeInUp" data-wow-delay="0.6s">
                                    <button type="submit" class="btn info-btn">Gönder</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
