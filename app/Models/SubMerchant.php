<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMerchant extends Model
{
    use HasFactory;

    public $fillable = [
        'company_id',
        'sub_merchant_key',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
