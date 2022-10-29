<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'sub_total_price',
        'total_price',
        'installment',
        'currency',
        'payment_id',
        'payment_status',
        'fraud_status',
        'merchant_commission_rate',
        'merchant_commission_rate_amount',
        'iyzi_commission_rate_amount',
        'iyzi_commission_fee',
        'card_type',
        'card_association',
        'card_family',
        'card_token',
        'card_user_key',
        'bin_number',
        'basket_id',
        'connector_name',
        'auth_code',
        'phase',
        'last_four_digits',
        'pos_order_id',
        'status',
        'error_code',
        'error_message',
        'error_group',
        'locale',
        'systemTime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d-m-Y H:i',
        'updated_at' => 'date:d-m-Y H:i',
    ];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Ymd His');
    }

    public function items()
    {
        return $this->hasMany(OrderPaymentItem::class);
    }
}
