@extends('layouts.web')
@section('title', 'Ön Bilgilendirme Formu - Exxefy')


@section('content')

    <x-pageTitle parentTitle="Politikalar" parentRoute="{{ route('policy.index') }}" title="Ön Bilgilendirme Formu" />

    <section class="clearfix">
        <div class="sbst-service-area pd-top-112">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-xl-12 col-lg-10">
                        <div class="section-title ">

                            <p><strong>1. TARAFLAR:</strong></p>

                            <p><strong><u>SATICI:</u></strong></p>
                            
                            <p><strong>Adı – Soyadı :</strong></p>
                            
                            <p><strong>Adresi : /</strong></p>
                            
                            <p><strong>Telefon :</strong></p>
                            
                            <p><strong>E-posta :</strong></p>
                            
                            <p><strong><u>ALICI (TÜKETİCİ):</u></strong></p>
                            
                            <p><strong>Adı – Soyadı :</strong></p>
                            
                            <p><strong>Adresi :</strong></p>
                            
                            <p><strong>Telefon :</strong></p>
                            
                            <p><strong>E-posta :</strong></p>
                            
                            <p><strong><u>SATIN ALINAN ÜRÜN:</u></strong></p>
                            
                            <p><strong>Ürünün Adı :</strong></p>
                            
                            <p><strong>Adedi :</strong></p>
                            
                            <p><strong>Teslimat Adresi :</strong></p>
                            
                            <p><strong>Teslim Edilecek Kişi :</strong></p>
                            
                            <p><strong>Fatura Adresi :</strong></p>
                            
                            <p><strong>Kargo Ücreti : Nakliyeye ilişkin kargo ve gönderim masrafları Alıcı’ya aittir. Bu bedel önceden net olarak hesaplanmamaktadır.</strong></p>
                            
                            <p><strong>Toplam Sipariş Tutarı (KDV Dahil) :</strong></p>
                            
                            <p><strong>Ödeme Şekli : Kredi kartı</strong></p>
                            
                            <p><strong>2. SÖZLEŞMENİN KONUSU</strong></p>
                            
                            <p><strong>2.1.</strong> İşbu Sözleşme, 07.11.2013 tarihli ve 6502 sayılı Tüketicinin Korunması Hakkında Kanun’un 48. ve 84. maddeleri uyarınca hazırlanmış olan 27.11.2014 tarihli ve 29188 sayılı Resmi Gazete’de yayınlanarak 27.02.2015 tarihinde yürürlüğe giren Mesafeli Sözleşmeler Yönetmeliği hükümlerine uygun olarak düzenlenmiştir.</p>
                            
                            <p><strong>2.2.</strong> İşbu Sözleşmenin tarafları olan Satıcı ve Alıcı, işbu Sözleşmeyle birlikte Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmeler Yönetmeliği’nden kaynaklanan yükümlülük ve sorumluluklarını bildiklerini ve anladıklarını kabul ve beyan ederler.</p>
                            
                            <p><strong>2.3.</strong> İşbu Ön Bilgilendirme Formu, Mesafeli Satış Sözleşmesi’nin eki ve ayrılmaz bir parçasıdır.</p>
                            
                            <p><strong>3. GEÇERLİLİK VE SÜRESİ</strong></p>
                            
                            <p><strong>3.1.</strong> İşbu formda yer alan ürün ya da hizmete ilişkin olarak Alıcı’ya sunulan tüm bilgiler ve vaatler Alıcı tarafından satın alınan ürünlerin teslimine kadar geçerli olup bu hizmetten sonra Satıcı tarafından işbu formda verilen bilgi ve vaatlerle bağlı kalınmadığı ihtar olunur.</p>
                            
                            <p><strong>3.2.</strong> İşbu ön bilgilendirme formu, elektronik ortamda Alıcı tarafından okunarak kabul edildikten sonra mesafeli satış sözleşmesi kurulması aşamasına geçilecektir.</p>
                            
                            <p><strong>4. CAYMA HAKKI</strong></p>
                            
                            <p><strong>4.1. Alıcı; malı teslim aldığı tarihten itibaren on dört gün içinde yürürlükteki mevzuatın izin verdiği ölçüde hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı reddederek Sözleşme’den cayma hakkına sahiptir. Tüketicinin cayma bildiriminin Satıcı’ya ulaştığı tarihten itibaren 10 (on) gün içinde ürün bedeli Alıcı’ya iade edilir. Cayma hakkının kullanımından kaynaklanan masraflar Satıcı’ya aittir.</strong></p>
                            
                            <p><strong>4.2. Satıcı, tüketicinin hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı teslim aldığı veya Sözleşmenin imzalandığı tarihten itibaren on dört gün içerisinde malı veya hizmeti reddederek Sözleşmeden cayma hakkının var olduğunu ve cayma bildiriminin Satıcı’ya ulaşması tarihinden itibaren ürünü geri almayı ve ürün bedelini Alıcı’ya ya da Yunus Emre Öztürk Şahıs Şirketi’ye iade etmeyi taahhüt etmektedir.</strong></p>
                            
                            <p><strong>4.3.</strong> Taraflar, Mesafeli Sözleşmeler Yönetmeliği m. 15/1 uyarınca cayma hakkının aşağıdaki hallerde kullanamayacağını kabul etmiştir:</p>
                            
                            <p><strong>4.3.1.</strong> Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve satıcı kontrolünde olmayan mal veya hizmetler,</p>
                            
                            <p><strong>4.3.2.</strong> Tüketicinin istekleri, talepleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallar,</p>
                            
                            <p><strong>4.3.3.</strong> Çabuk bozulabilen veya son kullanma tarihi geçebilecek mallar,</p>
                            
                            <p><strong>4.3.4.</strong> Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan mallardan iadesi sağlık ve hijyen açısından uygun olmayanlar,</p>
                            
                            <p><strong>4.3.5.</strong> Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan mallar,</p>
                            
                            <p><strong>4.3.6.</strong> Malın tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf malzemeleri,</p>
                            
                            <p><strong>4.3.7.</strong> Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli yayınlar,</p>
                            
                            <p><strong>4.3.8.</strong> Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma, araba kiralama, yiyecek-içecek tedariki ve eğlence veya dinlenme amacıyla yapılan boş zamanın değerlendirilmesine ilişkin hizmetler,</p>
                            
                            <p><strong>4.3.9.</strong> Elektronik ortamda anında ifa edilen hizmetler veya tüketiciye anında teslim edilen gayri maddi mallar,</p>
                            
                            <p><strong>4.3.10.</strong> Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile ifasına başlanan hizmetler.</p>
                            
                            <p><strong>5. YETKİLİ MAHKEME</strong></p>
                            
                            <p><strong>5.1.</strong> İşbu Sözleşmenin uygulanmasında ve çıkabilecek ihtilaflarda; her yıl Gümrük ve Ticaret Bakanlığı tarafından ilan edilen değere kadar Alıcı veya Satıcı’nın yerleşim yerindeki Tüketici Hakem Heyetleri, söz konusu değerin üzerindeki ihtilaflarda ise Tüketici Mahkemeleri yetkilidir.</p>
                            
                            <p><strong>5.2.</strong> İşbu Sözleşme elektronik ortamda Alıcı tarafından okunmuş, kabul edilmiş ve teyit edilmiştir. İşbu Sözleşmede düzenlenmemiş hususlarda 6502 sayılı Tüketicinin Korunması Hakkında Kanun ve sair ilgili mevzuat hükümleri uygulanır.</p>
                            
                            <p><strong>5.3.</strong> İşbu Sözleşme Alıcı’nın elektronik onayı tarihinde düzenlenmiş ve elektronik olarak Alıcı tarafından onaylandığı tarihte yürürlüğe girmiştir.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
