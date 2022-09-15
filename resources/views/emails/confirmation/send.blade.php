@component('mail::message')
# Üyelik başvurunuz gönderildi!

Sayın {{ $user->name }}, Üyelik başvurunuz Exxefy'a gönderildi. Ortalama 1 gün içerisinde başvurunuz sonuçlanacaktır.

Başvuru sonucunuz sizlere e-posta ile bildirilecektir.

Aynı zamanda hesabınıza giriş yaparak da başvuru durumunuzu takip edebilirsiniz.

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
