<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CargoCompany extends Model
{
    const STATUS_PASIVE = 0;
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'name',
        'status'
    ];
}
