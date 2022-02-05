@extends('layouts.web')
@section('title', 'Online Mağaza Oluştur, Kolayca Ödeme Al - Exxefy')
@section('description', 'Hemen Exxefy üzerinden hesap açıp, kolayca butik mağazanı yaratabilir ve online satış yapmaya başlabilirsin.')

@section('content')
<x-pageTitle title="Hemen Başla" />

<div class="work-processing-area pd-top-120">
    <div class="container">
        <div class="row justify-content-center custom-gutters-16 single-work-processing">
            <div class="col-xl-5 col-md-6 order-lg-12">
                <div class="thumb swp-right-thumb">
                    <img src="{{ asset('assets\img\work-processing\3.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-4 col-md-6 order-lg-1 desktop-center-item">
                <div class="work-processing-details">
                    <div class="section-title style-four">
                        <h1 class="counting-number">1</h1>
                        <h2 class="title">Saniyeler içinde <span>Kayıt</span> adımlarını tamamla!</h2>
                        <p>
                            Ürünlerini artık exxefy'da müşterilerine sunmaya hazır mısın?
                            <a href="{{ route('register') }}" class="mt-0"><strong class="text-exxefy">Buraya</strong></a> tıklayarak kayıt ol ekranından saniyeler içerisinde kayıt olabilirsiniz.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center custom-gutters-16 single-work-processing">
            <div class="col-xl-5 col-md-6">
                <div class="thumb">
                    <img src="{{ asset('assets\img\work-processing\1.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-4 col-md-6 desktop-center-item">
                <div class="work-processing-details">
                    <div class="section-title style-four">
                        <h1 class="counting-number">2</h1>
                        <h2 class="title"><span>Onaylandı!</span> artık Mağaza bilgilerini girebilirsin.</h2>
                        <p>
                            Panelinde görebileceğin Dükkan Yönetimi ekranından; müşterilerinin görebileceği,
                            mağaza bilgilerini (logo, dükkan adı, telefon, e-posta vb. bilgileri) girebilirsin.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center custom-gutters-16 single-work-processing">
            <div class="col-xl-5 col-md-6 order-lg-12">
                <div class="thumb swp-right-thumb">
                    <img src="{{ asset('assets\img\work-processing\2.png') }}" alt="img">
                </div>
            </div>
            <div class="col-xl-4 col-md-6 order-lg-1 desktop-center-item">
                <div class="work-processing-details">
                    <div class="section-title style-four">
                        <h1 class="counting-number">3</h1>
                        <h2 class="title">Sırada <span>Ürünlerini</span> girmen kaldı!</h2>
                        <p>
                            Artık gelişmiş ürün yönetimi ekranından, ürünlerini tüm özellikleri, bilgileri ve
                            galerisiyle birlikte mağazana kaydedebilirsin.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center custom-gutters-16 single-work-processing">
            <div class="col-xl-5 col-md-6">
                <div class="thumb">
                    <img src="assets\img\work-processing\4.png" alt="img">
                </div>
            </div>
            <div class="col-xl-4 col-md-6 desktop-center-item">
                <div class="work-processing-details">
                    <div class="section-title style-four">
                        <h1 class="counting-number">4</h1>
                        <h2 class="title">Ürünlerini <span>tüm ödeme yöntemleri</span> ile satmaya ve paketlemeye hazırsın!</h2>
                        <p>
                            Mağazan müşterilerinin rahatlıkla ürünlerini görüntülemesi ve satın alması için hazır! Bu aşamadan sonra
                            sipariş, kargo ve müşteri yönetimi kısmında da exxefy hazır!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center custom-gutters-16 single-work-processing">
            <div class="col-xl-5 col-md-6 order-lg-12">
                <div class="thumb swp-right-thumb">
                    <img src="assets\img\work-processing\5.png" alt="img">
                </div>
            </div>
            <div class="col-xl-4 col-md-6 order-lg-1 desktop-center-item">
                <div class="work-processing-details">
                    <div class="section-title style-four">
                        <h1 class="counting-number">5</h1>
                        <h2 class="title">Gelişmiş <span>Gösterge Paneli</span> ile siparişleri kontrol et!</h2>
                        <p>
                            Exxefy'da mağazanda olup biteni çevrimiçi kontrol edebilirsin. Anlık sipariş rakamları,
                            kullanıcı sayısı, tamamlanan siparişler, kargo durumları gibi aradığın tüm kontroller bu ekranlarda
                            kontrolünüzde.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
