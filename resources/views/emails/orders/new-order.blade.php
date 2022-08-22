@component('mail::message')
# Teşekkürler! Siparişiniz oluşturuldu.

Siparişinizin teslimatı için gerekli bilgiler satıcıya iletilmiştir. Exxefy aracılığında güvenli alışverişi tercih ettiğiniz için teşekkür ederiz.

# Sipariş No: {{$order->id}}
@component('mail::table')
| Satıcı                      | Ara Toplam                  | Kargo Ücreti             | Toplam Ücret               |
| :-------------------------: |:---------------------------:| :-----------------------:| :-------------------------:|
| {{$order->company_view}}    | {{$order->sub_total_price}} | {{$order->cargo_price}}  | {{$order->total_price}}    |
@endcomponent

# Ürünleriniz
@component('mail::table')
| Ürün                        | Adet                   | Ücret                | Toplam Ücret               |
| :-------------------------: |:----------------------:| :-------------------:| :-------------------------:|
@foreach($order->products as $product)
| {{$product->product_view}}  | {{$product->quantity}} | {{$product->price}}  | {{$product->total_price}}  |
@endforeach
@endcomponent

@component('mail::button', ['url' => ''])
Siparişi Takip Et!
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
