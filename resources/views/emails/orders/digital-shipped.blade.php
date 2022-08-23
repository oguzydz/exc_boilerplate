@component('mail::message')
# Siparişiniz Tamamlandı!

Siparişiniz satıcı tarafından dijital ortamda teslim edilmiştir. Exxefy aracılığında güvenli alışverişi tercih ettiğiniz için teşekkür ederiz.

# Satıcıdan Gelen Bilgi
@component('mail::table')
| Not                       |
| :-----------------------: |
| {{$order->result->note}}  |
@endcomponent

# Sipariş No: {{$order->id}}
@component('mail::table')
| Satıcı                      | Ara Toplam                  | Kargo Ücreti             | Toplam Ücret               |
| :-------------------------: |:---------------------------:| :-----------------------:| :-------------------------:|
| {{$order->company_view}}    | {{$order->sub_total_price}} | {{$order->cargo_price}}  | {{$order->total_price}}    |
@endcomponent

@component('mail::button', ['url' => ''])
Siparişi Takip Et!
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
