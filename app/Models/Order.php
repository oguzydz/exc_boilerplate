<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    const STATUS_GIVEN     = 0;
    const STATUS_PAID      = 1;
    const STATUS_PROCESSED = 2;
    const STATUS_INCARGO   = 3;
    const STATUS_COMPLETED = 4;
    const STATUS_CANCELED  = 5;
    const STATUS_ERROR     = 6;

    protected $fillable = [
        'company_id',
        'name',
        'surname',
        'email',
        'phone',
        'address',
        'city_id',
        'county_id',
        'zip_code',
        'identity_number',
        'note',
        'cargo_price',
        'sub_total_price',
        'total_price',
        'ip_address',
        'status',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function payment(int $userId)
    {
        return $this->hasOne(Payment::class, 'order_id', 'id')->where('payments.user_id', $userId);
    }

    public function result()
    {
        return $this->hasOne(OrderResult::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function statusList()
    {
        $statusList = [
            self::STATUS_GIVEN     => 'ÖDEME BEKLENİYOR',
            self::STATUS_PAID      => 'ÖDENDİ',
            self::STATUS_PROCESSED => 'İŞLEME ALINDI',
            self::STATUS_INCARGO   => 'KARGOYA VERİLDİ',
            self::STATUS_COMPLETED => 'TAMAMLANDI',
            self::STATUS_CANCELED  => 'İPTAL EDİLDİ',
            self::STATUS_ERROR     => 'HATALI İŞLEM',
        ];

        return $statusList;
    }

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
