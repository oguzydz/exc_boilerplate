<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPaymentItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'order_id',
        'order_payment_id',
        'payment_transaction_id',
        'transaction_status',
        'price',
        'paid_price',
        'merchant_commission_rate',
        'merchant_commission_rate_amount',
        'iyzi_commission_rate_amount',
        'iyzi_commission_fee',
        'blockage_rate',
        'blockage_rate_amount_merchant',
        'blockage_rate_amount_sub_merchant',
        'blockage_resolved_date',
        'sub_merchant_key',
        'sub_merchant_price',
        'sub_merchant_payout_rate',
        'sub_merchant_payout_amount',
        'merchant_payout_amount'
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
}
