<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    protected $fillable = [
        'papara_account_name',
        'papara_account_number',
        'bitcoin_wallet_address',
        'bitcoin_wallet_network_name',
        'bank_account_name',
        'bank_account_iban',
        'whatsapp',
        'whatsapp_text',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
