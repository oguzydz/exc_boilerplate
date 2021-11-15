<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    const STATUS_GIVEN = 0;
    const STATUS_PAID = 1;
    const STATUS_PROCESSED = 2;
    const STATUS_COMPLETED = 3;
    const STATUS_CANCELED = 4;

    protected $fillable = ['text', 'status', 'user_id', 'product_id'];

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
            self::STATUS_GIVEN => 'ÖDEME BEKLENİYOR',
            self::STATUS_PAID => 'ÖDENDİ',
            self::STATUS_PROCESSED => 'İŞLEME ALINDI',
            self::STATUS_COMPLETED => 'TAMAMLANDI',
            self::STATUS_CANCELED => 'İPTAL EDİLDİ',
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
