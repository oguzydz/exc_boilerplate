@extends('layouts.web')
@section('title', 'Alışveriş Güvenliği - Exxefy')


@section('content')

    <x-pageTitle parentTitle="Politikalar" parentRoute="{{ route('policy.index') }}" title="Alışveriş Güvenliği" />

    <section class="clearfix">
        <div class="sbst-service-area pd-top-112">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-xl-12 col-lg-10">
                        <div class="section-title ">

                            <p><strong>Kredi Kartı Güvenliği:</strong></p>
                            <p>- Şirket, herhangi bir ürün veya hizmet satışı yapmamaktadır. Tarafınızca satın alınan ürünler, Şirket tarafından değil, Satıcılar tarafından satışa sunulmaktadır ve satın almanız halinde tarafınıza Satıcılar tarafından gönderilmektedir. Şirket Satıcılarla Alıcıları bir araya getiren bir platformdur.</p>
                            <p>- Exxefy üzerinden yapacağınız tüm alışverişlerde her bankanın tüm kredi kartları ile ödeme yapabilirsiniz.</p>
                            <p>- Exxefy üzerinden kredi kartıyla yapacağınız alışverişlerde, Şirket güvenliğiniz için her zaman için en son teknolojileri kullanmakta ve en iyi hizmet sağlayıcılarla çalışmaktadır.</p>
                            <p>- Kişisel bilgi girilen her sayfada internet tarayıcınızda göreceğiniz anahtar simgesi, tarayıcınızla gönderdiğiniz hiçbir bilginin üçüncü kişilerce görüntülenmeyeceğinin bir taahhüdüdür.</p>
                            <p>- Güvenlik amacıyla Exxefy üzerinden vereceğiniz her siparişi oluşturma aşamasında kart bilgilerini yeniden girmeniz gerekmektedir. Şirket, kişisel bilgilerinizi, kredi kart numaranızı ya da kredi kartı şifrelerinizi kayıt altına almaz ya da saklamaz.</p>
                            <p>- Kart bilgileriniz Şirket tarafından saklanmadığınızdan kartınız Şirket’ten kaynaklanan bir sebeple bilginiz dışında kullanılamaz.</p>
                            <p>- Şirket’in, Satıcı ve/veya Ödeme Hizmet Sağlayıcıların sakladığı/saklayacağı bilgiler konusunda herhangi bir sorumluluğu bulunmamaktadır.</p>
                            
                            <p><strong>3 Boyutlu Güvenlik / 3D Secure:</strong></p>
                            <p>- 3 Boyutlu Güvenlik (3D Secure), çevrimiçi alışverişlerin güvenliğini sağlamak amacıyla kredi kartı şirketleri tarafından geliştirilmiş bir kimlik doğrulama sistemine verilen isimdir. Bu yöntemle gerçekleştirilen alışverişlerin geçerli sayılabilmesi için; kart sahibinin yapılan işlemi, kendine verilen özel bir şifreyle doğrulayıp onay sürecini tamamlaması gerekmektedir.</p>
                            <p>- Exxefy üzerinden yapacağınız alışverişlerde, bankanızın bu güvenlik sistemini desteklemesi halinde ödemenizi 3 Boyutlu güvenlik şifrenizi kullanarak gerçekleştirmenizi sağlayabilir.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
