<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
    const STATUS_PASIVE = 0;
    const STATUS_ACTIVE = 1;

    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->title;
    }

    public function getBuyablePrice($options = null) {
        return $this->price;
    }

    const STATUS_LIST = [
        'Pasif' => self::STATUS_PASIVE,
        'Aktif' => self::STATUS_ACTIVE,
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
        return $this->belongsTo(Category::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
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
