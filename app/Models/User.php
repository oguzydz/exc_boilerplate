<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    const STATUS_NEW      = 0;
    const STATUS_ACTIVE   = 1;
    const STATUS_PASIVE   = 2;
    const STATUS_DELETED  = 3;
    const STATUS_READY    = 4;
    const STATUS_CANCELED = 5;

    public static $statuses = array(
        self::STATUS_NEW      => 'Yeni',
        self::STATUS_ACTIVE   => 'Aktif',
        self::STATUS_PASIVE   => 'Pasif',
        self::STATUS_DELETED  => 'Silinmiş',
        self::STATUS_READY    => 'Onay Bekliyor',
        self::STATUS_CANCELED => 'Reddedildi',
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'membership_type',
        'born_date',
        'name',
        'tc',
        'phone',
        'address',
        'city_id',
        'county_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'        => 'date:d-m-Y H:i',
        'updated_at'        => 'date:d-m-Y H:i',
        'born_date'         => 'date:d-m-Y',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['profile_photo_url', 'status_view'];

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

    public function iban()
    {
        return $this->hasOne(UserIban::class);
    }

    public function confirmData()
    {
        return $this->hasOne(UserConfirmData::class);
    }

    public function type()
    {
        return $this->hasOne(UserType::class, 'id', 'membership_type');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'user_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id', 'id');
    }

    public function getStatusViewAttribute()
    {
        return self::$statuses[$this->status];
    }

    public function getFirstAndLastName()
    {
        $nameArr = explode(" ", $this->name);

        return [
            'lastName'  => array_pop($nameArr),
            'firstName' => implode(" ", $nameArr)
        ];
    }
}
