<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    const EXAMPLE_LOGO_URL = 'company-assets/example-logo.png';
    const EXAMPLE_BG_URL = 'company-assets/example-bg.png';

    public $fillable = [
        'user_id',
        'title',
        'text',
        'logo',
        'bg_image',
        'email',
        'phone',
        'slug',
    ];
}