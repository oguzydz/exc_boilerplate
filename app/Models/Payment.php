<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'papara_account_name',
        'papara_payment_date',
        'bitcoin_wallet_address',
        'bitcoin_payment_date',
        'bank_account_number',
        'bank_payment_date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
