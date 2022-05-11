<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'company_id',
        'email',
        'text',
        'message'
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
