<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
    const STATUS_PASIVE = 0;
    const STATUS_ACTIVE = 1;
    const TYPE_DEFAULT  = 0;
    const TYPE_DIGITAL  = 1;

    const FILTER_ORDER_BY_LIST = [
        ['id', 'asc'],
        ['price', 'asc'],
        ['created_at', 'desc'],
    ];

    const STATUS_LIST = [
        'Pasif' => self::STATUS_PASIVE,
        'Aktif' => self::STATUS_ACTIVE,
    ];

    const TYPE_LIST = [
          self::TYPE_DEFAULT => 'Fiziksel',
          self::TYPE_DIGITAL => 'Dijital' ,
    ];

    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    public function getBuyableDescription($options = null)
    {
        return $this->title;
    }

    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

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
        'type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'status',
        'image_seo',
        'product_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['category_view', 'type_view'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'  => 'date:d-m-Y H:i',
        'updated_at'  => 'date:d-m-Y H:i',
    ];

    public function getCategoryViewAttribute()
    {
        return $this->category->title;
    }

    public function getTypeViewAttribute()
    {
        return self::TYPE_LIST[$this->type];
    }

    public static function getNextId()
    {
        if (Product::all()->last() !== null) {
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
