@extends('layouts.web')
@section('title', 'Uygulama Mağazası KVKK - Exxefy')


@section('content')

    <x-pageTitle parentTitle="Politikalar" parentRoute="{{ route('policy.index') }}" title="Uygulama Mağazası KVKK" />

    <section class="clearfix">
        <div class="sbst-service-area pd-top-112">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-xl-12 col-lg-10">
                        <div class="section-title ">

                            <p><strong>1.</strong> Yunus Emre Öztürk Şahıs Şirketi (“Şirket”), bir elektronik ticaret çözümü olarak hizmet vermektedir. İşbu Kişisel Verilerin Korunması ve İşlenmesine İlişkin Aydınlatma Metni ve Gizlilik Politikası, Şirket tarafından sunulan Exxefy Uygulama Mağazası (“Uygulama Mağazası”) kapsamında, Üyeler tarafından paylaşılan kişisel veriler, mevzuata uygun şekilde, Şirket’in faaliyet konusu ve hizmet amaçları ile bağlantılı ve de ölçülü olarak işlenebilecek, gerekli olması durumunda üçüncü kişilere aktarılabilecek ve mevzuata uygun süreler boyunca saklanabilecektir.</p>

                            <p><strong>2.</strong> Şirket, Üyeler’in gizliliği korumak ve kullanılmakta bulunan teknolojik altyapıdan en üst seviyede yararlanmalarını sağlayabilmek amacıyla kişisel bilgi ve veri güvenliği hususunda gizlilik ilkeleri benimsemiştir. Bu gizlilik ilkeleri, Uygulama Mağazası vasıtası ile kişisel verilerle sınırlı olmamak üzere veri toplanması ve/veya verilerin kullanımı konusunda uygulanmak üzere belirlenmiştir. Hizmetlerimizin hızlı, kolay ve güvenilir şekilde sunulması maksadıyla kişisel verilerin işlenmesi ve üçüncü kişilere aktarılması gereklidir. Bu kapsamda, Şirket ile paylaşılan kişisel veriler, Türkiye Cumhuriyeti Anayasası başta olmak üzere, 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”), 6563 sayılı Elektronik Ticaretin Düzenlenmesi Hakkında Kanun, Türk Ceza Kanunu ve ilgili mevzuatta yer alan hükümlere uygun şekilde işlenmektedir.</p>
                            
                            <p><strong>3.</strong> Uygulama Mağazası’ndan sunulan Hizmetler kapsamında kişisel veriler Anayasa’nın 20. maddesine ve KVKK’nın 4. maddesine uygun olarak; hukuka ve dürüstlük kurallarına uygun, doğru ve güncel olarak, belirli, açık ve meşru amaçlar güderek, işleme amaçlarıyla bağlantılı ve sınırlı ve ölçülü bir biçimde, mevzuatta öngörülen veya kişisel veri işleme amacının gerektirdiği süre kadar muhafaza etmek suretiyle, KVKK’nın 5. ve 6. maddesinde belirtilen şartlardan bir veya birkaçına dayanarak işlenmekte ve aktarılmaktadır.</p>
                            
                            <p><strong>4.</strong> Kişisel veriler, Şirket tarafından verilen hizmetlerin amaçlarıyla orantılı olarak, Şirket’in faaliyetlerini sürdürmesi, daha iyi hizmet vermesini sağlamak, verdiği hizmetin kalitesini ölçmek ve geliştirmek, tercih ve ihtiyaçları tespit etmek, yürürlükteki mevzuata uygun davranmak, Üyeler’le iletişime geçmek amaçlarıyla yürürlükteki mevzuata uygun şekilde açık rıza alınmak koşulu ile veya yürürlükteki mevzuat kapsamında açık rıza alınması gerekmemesi halinde açık rıza alınmaksızın işlenmektedir.</p>
                            
                            <p><strong>5.</strong> Uygulama Mağazası kapsamında, Üyelerin; adı, soyadı, telefon numarası, elektronik posta adresi, banka ve ödeme bilgileri ile Uygulama Mağazası’nın ve de Uygulamaların kullanımlarından doğan veriler işlenmektedir. Şirket, kişisel verileri sözleşme ilişkisi boyunca başkaca bir onaya gerek olmaksızın ve hesabın kapatılmasını takiben 10 (on) yıldan uzun süreli olmamak üzere işleyebilir.</p>
                            
                            <p><strong>6.</strong> Üyeler kişisel verilerini Uygulama Mağazası’nda bulunan çeşitli alanların doldurulması suretiyle Şirket’e iletmektedir. Bu çerçevede Şirket, Üyeler tarafından sağlanan bu kişisel veriler ile bağlı olup söz konusu kişisel verilerin doğruluğunun ve güncelliğinin sağlanması ilgili Üye’nin sorumluluğudur.</p>
                            
                            <p><strong>7.</strong> Şirket, Üyeler tarafından sağlanan kişisel verileri Şirket veya işbirliği içinde olduğu kişiler tarafından kişisel bilgiler anonim tutulmak suretiyle kullanabilir. Bu kapsamda Şirket, Kullanıcılar tarafından sağlanan her türlü bilgi ve veriyi 6698 sayılı Kişisel Verilerin Korunması Kanunu’na ve yürürlükteki ikincil mevzuata uygun olarak anonim hale getirmek sureti ile başkaca verilerle eşleştirilerek dahi hiçbir şekil ve surette kimliği belirlenebilir bir gerçek kişi ile ilişkilendirilemeyecek şekilde muhafaza edebilir ve bu kapsamda anonimleştirilmiş verileri istatistiki değerlendirmeler, pazar araştırmaları ve benzeri amaçlarla dilediği şekilde kullanabilir.</p>
                            
                            <p><strong>8.</strong> Şirket, çevrimiçi servisleri, interaktif uygulamaları, e-posta mesajları ve reklamları, çerezleri ve diğer teknolojileri kullanabilir. Bu teknolojiler ile, Kullanıcılar tarafından Şirket ile paylaşılan bilgiler ile kamuya açık bilgileri karşılaştırabilir; cihazın işletim sistemi, işletim sistemi dili, işlemci tipi, tarayıcı sürümü, cihazın lokasyonu, saat dilimi, IP adresi ve benzeri bilgileri tespit edebilir. Ayrıca, Şirket veya yetkilendireceği üçüncü kişiler, Üyeler’in Internet Protokol (IP) adresini, sistemle ilgili sorunların tanımlanması ve çıkabilecek teknik sorunların çözülebilmesi için gerekli olması halinde tespit edebilir ve bunları kullanabilir.</p>
                            
                            <p><strong>9.</strong> Özel nitelikli kişisel veriler (din, mezhep, etnik köken, ırk vs.) Şirket tarafından Üyeler’in açık rızaları bulunmaksızın talep edilmeyecek ve işlenmeyecektir.</p>
                            
                            <p><strong>10.</strong> Belirli durumlarda Şirket, işbu Aydınlatma Metni ve Gizlilik Politikası’nda açıkça belirtilen durumların ve/veya kişilerin dışında Üyeler’e ilişkin bilgileri üçüncü kişilere açıklayabilir. Bu durumlar bu sayılanlarla sınırlı sayıda olmamak üzere; yürürlükteki mevzuat ile getirilen sorumluluklara uymak, Kullanım Koşulları ve Üyelik Sözleşmesi ile eklerinin gereklerini yerine getirmek ve yetkili otorite tarafından ilgili mevzuata göre yürütülen bir araştırma amacıyla kullanıcılarla ilgili bilgi talep edilmesi için bilgi vermenin gerekli olduğu haller ile 6698 sayılı Kişisel Verilerin Korunması Kanunu’nda sayılan diğer istisnai durumlardır.</p>
                            
                            <p><strong>11.</strong> Üyeler, Şirket’ten; kişisel verilerinin işlenip işlenmediğini sorgulama, işlenmişse bu konuda bilgi talep etme, kişisel verilerini işlenme amacını ve amacına uygun kullanılıp kullanılmadığını, yurt içi veya yurtdışına aktarılıp aktarılmadığını sorgulama, kişisel verilerine ilişkin herhangi bir eksiklik veya yanlışlık bulunması halinde bu yanlışlığın giderilmesini isteme; kişisel verilerin silinmesini veya yok edilmesini isteme ve bu durumun kişisel verilerin aktarıldığı üçüncü kişilere de bildirilmesini talep etme haklarını haizdir. Yürürlükteki mevzuattan doğan bu hakları kullanmak için, Üyeler, bu yöndeki taleplerini KVKK’nın 13. maddesi doğrultusunda, Şirket’in aşağıda belirtilen adresine; adı ve soyadı ve de imzası ile, Türkiye Cumhuriyeti vatandaşı ise T.C. kimlik numarası, Türkiye Cumhuriyeti vatandaşı değil ise uyruğu, pasaport numarası veya varsa kimlik numarası, tebligata esas yerleşim yeri veya iş yeri adresi, bildirime esas elektronik posta adresi ve telefon numarası ve de talep konusunu ve kimliğinizi tespite yarayan gerekli bilgi ve belgeleri eklemek sureti ile yazılı olarak başvuruda bulunabilirler. Başvurular Şirket tarafından değerlendirilecek ve otuz gün içinde ücretsiz olarak sonuçlandırılacaktır.</p>
                            
                            <p>KVKK’nın 11. maddesi kapsamındaki başvurular için:</p>
                            <p>- Veri Sorumlusu: Yunus Emre Öztürk Şahıs Şirketi</p>
                            <p>- Adres: Fatih Sultan Mh. Şiir Sk. Relux Plaza No:10 Daire:24 Kat:4 Ümraniye 34771 İstanbul, TÜRKİYE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
