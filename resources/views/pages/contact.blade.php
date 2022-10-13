@extends('layouts.web')
@section('title', 'İletişim - Exxefy')
@section('description', 'İletişim araçları yardımıyla 7/24 Exxefy teknik ekibinden yardım alabilirsiniz.')


@section('content')
    <x-pageTitle title="İletişim" />

    <div class="contact-form-area pd-top-112">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center w-100">
                        <h2 class="title">Hemen <span>iletişim</span> kur</h2>
                        <p>
                            Aşağıdaki formu doldurarak bize aklından geçen tüm soruları sorabilirsin. Geri dönüşler
                            genellikle aynı gün yapılmaktadır.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5">
                    <img src="assets\img\others\21.png" alt="blog">
                </div>
                <div class="col-lg-7 offset-xl-1">
                    <form action="{{ route('contact.send') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row custom-gutters-16">
                            <div class="col-md-6">
                                <div class="single-input-wrap">
                                    <input type="text" name="name" id="name" required class="single-input">
                                    <label>Ad-Soyad</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-wrap">
                                    <input type="email" name="email" id="email" required class="single-input">
                                    <label>E-Posta</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input-wrap">
                                    <input type="text" name="text" id="subject" class="single-input" required>
                                    <label>Konu</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input-wrap">
                                    <textarea class="single-input textarea" name="message" id="message" cols="20" required></textarea>
                                    <label class="single-input-label">Mesaj</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-red mt-0" type="submit">Gönder</button>
                            </div>
                            @if ($errors->any())
                                <div class="col-md-12  mt-4">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <p>
                                            Lütfen yukarıda yazan hatalı düzeltiniz.
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="map-area pd-top-120">
        <div class="container">
            <div class="map-area-wrap">
                <div class="row no-gutters">
                    <div class="col-lg-8">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.0205876628484!2d29.12109331533691!3d41.024805526356516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac91c29260f99%3A0x280be4fa582a47!2sExxefy!5e0!3m2!1str!2str!4v1665641916804!5m2!1str!2str"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-4 desktop-center-item">
                        <div>
                            <div class="contact-info">
                                <h4 class="title">İletişim bilgileri:</h4>
                                <p class="sub-title">
                                    Aşağıda bizimle doğrudan iletişime geçebileceğin adresler ve şirket bilgileri yer
                                    almaktadır.
                                </p>
                                <p><span>Adres:</span> Şiir Sokak, Fatih Sultan Mehmet Mahallesi, Relux Plaza,
                                    <br> Ümraniye/İstanbul
                                </p>
                                <p><span>Telefon:</span> 0537 496 5001</p>
                                <p><span>E-Posta:</span> info@exxefy.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
