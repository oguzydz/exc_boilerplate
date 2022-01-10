<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const STATUS_LIST = [
        'STATUS_PASIVE' => 2,
        'STATUS_DELETED' => 0,
        'STATUS_ACTIVE' => 1,
    ];

    protected $fillable = [
        'title',
        'text',
        'slug',
        'price',
        'discount_price',
        'image',
        'order',
        'category_id',
        'company_id',
        'delivery_time',
        'stock',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'status',
        'image_seo',
        'product_id'
    ];

    public static function getNextId()
    {
        if(Product::all()->last() !== null) {
            $lastId = Product::all()->last()->id + 1;
        } else {
            $lastId = 1;
        }

        return $lastId;
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function featuresWithLimit()
    {
        return $this->hasMany(ProductFeature::class)->limit(2);
    }
}
