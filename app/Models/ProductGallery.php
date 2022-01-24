<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'image',
        'order',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
