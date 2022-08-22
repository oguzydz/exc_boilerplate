@component('mail::message')
# Siparişiniz Kargoya Verildi!

Siparişiniz satıcı tarafından kargoya verildi. Exxefy aracılığında güvenli alışverişi tercih ettiğiniz için teşekkür ederiz.

# Kargo Bilgileri
@component('mail::table')
| Kargo Firması                           | Takip Numarası                  |  Not                      |
| :-------------------------------------: |:-------------------------------:|  :------------------------:|
| {{$order->result->cargo_company_view}}  | {{$order->result->shipping_no}} |  {{$order->result->note}} |
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
