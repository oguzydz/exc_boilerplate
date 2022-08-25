<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_GIVEN     = 0;
    const STATUS_PAID      = 1;
    const STATUS_PROCESSED = 2;
    const STATUS_SHIPPED   = 3;
    const STATUS_COMPLETED = 4;
    const STATUS_CANCELED  = 5;
    const STATUS_ERROR     = 6;
    const STATUS_THREEDS   = 7;
    const STATUS_RETURN    = 8;

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
        'type',
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['company_view', 'city_view', 'county_view', 'status_view'];

    public function statusList()
    {
        $statusList = [
            self::STATUS_GIVEN     => 'ÖDEME BEKLENİYOR',
            self::STATUS_PAID      => 'ÖDENDİ',
            self::STATUS_PROCESSED => 'İŞLEME ALINDI',
            self::STATUS_SHIPPED   => 'KARGOYA VERİLDİ',
            self::STATUS_COMPLETED => 'TAMAMLANDI',
            self::STATUS_CANCELED  => 'İPTAL EDİLDİ',
            self::STATUS_ERROR     => 'HATALI İŞLEM',
            self::STATUS_THREEDS   => '3D AŞAMASI',
            self::STATUS_RETURN    => 'İADE EDİLDİ',
        ];

        return $statusList;
    }

    public function getCompanyViewAttribute()
    {
        return $this->company->title;
    }

    public function getCityViewAttribute()
    {
        return $this->city->city;
    }

    public function getCountyViewAttribute()
    {
        return $this->county->county;
    }

    public function getStatusViewAttribute()
    {
        return $this->statusList()[$this->status];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function payment()
    {
        return $this->hasOne(OrderPayment::class);
    }

    public function result()
    {
        return $this->hasOne(OrderResult::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
