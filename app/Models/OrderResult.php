<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderResult extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'cargo_company_id',
        'shipping_no',
        'note',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d-m-Y H:i',
        'updated_at' => 'date:d-m-Y H:i',
    ];

    protected $appends = ['cargo_company_view'];

    public function getCargoCompanyViewAttribute()
    {
        return $this->cargoCompany->name;
    }

    public function cargoCompany()
    {
        return $this->belongsTo(CargoCompany::class);
    }
}
