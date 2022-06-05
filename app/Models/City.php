<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    const DEFAULT_COUNTRY = 'Turkey';

    public function counties()
    {
        return $this->hasMany(County::class);
    }
}
