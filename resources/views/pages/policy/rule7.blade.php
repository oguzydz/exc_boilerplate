@extends('layouts.web')
@section('title', 'Hizmet Bedeli Koşulları - Exxefy')


@section('content')

    <x-pageTitle parentTitle="Politikalar" parentRoute="{{ route('policy.index') }}" title="Hizmet Bedeli Koşulları" />

    <section class="clearfix">
        <div class="sbst-service-area pd-top-112">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-xl-12 col-lg-10">
                        <div class="section-title ">

                            <p><strong>Exxefy üzerinden yapılacak satışlarda Şirket’in sunduğu Hizmeteler’e ilişkin Satıcı tarafından ödenecek bedellere ve Alıcı tarafından yapılacak ödemenin kabul işleminin Türkiye sınırları dahilinde olması halinde Satıcı’ya aktarılmasına ilişkin koşullar aşağıda belirtilen şekildedir. Exxefy, burada belirtilen koşulları her zaman, ayrıca hiçbir bildirimde bulunmadan değiştirme hakkına haizdir.</strong></p>

                            <p>- Şirket, burada belirtilen bedellerde ve koşullarda her zaman, ayrıca hiçbir bildirimde bulunmadan değişiklik yapma hakkını saklı tutar. Bununla birlikte, Hizmet Bedeli Koşulları’nın değiştirilmesi halinde Satıcı 30 (otuz) gün içinde Üyelik Sözleşmesi’ni feshetme hakkını haizdir.</p>
                            <p>- Alıcı tarafından ödenen satış bedeli Şirket’in sunduğu hizmetin bedelinin kesilmesinden sonra Satıcı’nın üyelik bilgileri çerçevesinde verdiği banka hesabına aktarılacaktır. Bu banka hesabının herhangi bir sebeple bloke olması, banka tarafından kara listeye alınmış olması veyahut da benzeri sebeplerle paranın verilen banka hesabına aktırarılamamasından Şirket’in hiçbir koşul altında sorumluluğu bulunmamaktadır.</p>
                            <p>- Hizmet Bedeli düşüldükten sonra satış bedelinden kalan bedel, Satıcı’nın Şirket’e bildirdiği ve sadece Türkiye Cumhuriyeti sınırları içinde olan bir banka hesabına transfer edilecektir. Transferden doğan ve bankalar ile diğer üçüncü kişiler tarafından talep edilen herhangi bir masraf var ise bu masraf da söz konusu satış bedelinden düşülecektir.</p>
                            <p>- Alıcı ve Satıcı arasında herhangi bir uyuşmazlık çıkması halinde dahi Şirket, tahsil edilen Hizmet Bedelini Alıcı veya Satıcı’ya ödeme veya iade etme yükümlülüğü yoktur.</p>
                            <p>- Şirket’in Hizmet Bedeli, Satıcı’nın bir önceki ay içerisindeki Aylık Satış Hacmi hesaplanarak belirlenmektedir. Güncel hizmet bedeli oranlarına üyelik panelinin sağ üst köşesinden erişilmektedir.</p>
                            <p>- Satıcı’nın taksitli ödeme imkanı sunduğu ve Alıcı’nın bu imkandan yararlanıp taksitli ödeme yaptığı işlemler Şirket tarafından tek taraflı olarak belirlenecek ek bedellere tabi olabilir. Taksitli işlemlerde, güvenlik sebebiyle işlem tutarının en fazla %2’ye (yüzde ikiye) kadar olan kısmı Şirket tarafından 7 (yedi) gün süre ile bloke olarak tutulabilir. Bloke olarak tutulan bu tutar, blokaj tarihinden 7 (yedi) gün sonra serbest bırakılmakta ve takip eden ilk tahsilat gününde Satıcı’nın hesabına aktarılmaktadır.</p>
                            <p>- Şirket, Satıcılar’ın satışa sundukları hizmetleri değerlendirmek üzere ve/veya gerekli görmesi halinde Alıcılar tarafından ödenecek bedelleri bloke olarak tutabilir. Bloke olarak tutulacak tutarlara ilişkin bilgilendirme Şirket tarafından her bir Satıcı’ya ayrı ayrı yapılacaktır.</p>
                            <p>- Şirket tarafından sunulan hizmet kapsamında, Satıcılar’ın adı, unvanı, alan adı, markası, ürünü ve/veya hizmeti, Exxefy’da belirtilen herhangi bir bilgi vasıtasıyla ya da başka herhangi bir yolla ödeme hizmeti verdiği izlenimini yaratması halinde ilgili Satıcı’nın ödemeleri Şirket tarafından süresiz olarak bloke edilir ve üyeliği süresiz olarak askıya alınır. Ayrıca Şirket’ı yanıltmak amacıyla, satışın yapıldığı mecrada gerçeği yansıtmayacak şekilde bilgiler verdiğini Alıcılar’a herhangi bir şekilde belirtmesi halinde ilgili Satıcı’nın ödemeleri Şirket tarafından süresiz olarak bloke edilir ve Şirket’in işbu maddede belirtilen sebepler uyarınca bir zararının olması halinde, söz konusu zarar bloke edilen tutardan karşılanır. Şirket’in zararının bloke edilen tutarı aşması halinde Şirket tüm zararını, zarara sebep olan Satıcı’dan tahsil edebilir ve bu sebeple yasal yollara başvuru hakkını haizdir.</p>
                            <p>- Yürürlükteki mevzuat kapsamında ödeme kuruluşlarından, bankalardan kredi kuruluşlarından veya kredi kartı sağlayıcılardan (Visa, Mastercard, Amex vb.) herhangi bir Satıcı’nın işlem veya işlemleriyle ilgili yazılı veya sözlü uyarı veya her ne neviden olursa olsun ceza gelmesi durumunda, ilgili Satıcı’nın ödemeleri Şirket tarafından süresiz olarak bloke edilir ve Şirket’in işbu maddede belirtilen sebepler uyarınca bir zararının olması halinde, söz konusu zarar bloke edilen tutardan karşılanır. Şirket’in zararının bloke edilen tutarı aşması halinde Şirket tüm zararını, zarara sebep olan Satıcı’dan tahsil edebilir ve bu sebeple yasal yollara başvuru hakkına haizdir.</p>
                            <p>- Belirtilen Exxefy Hizmet Bedeli KDV hariçtir.</p>                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
