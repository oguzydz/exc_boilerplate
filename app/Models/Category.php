<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const STATUS_PASIVE = 0;
    const STATUS_ACTIVE = 1;
    const DEFAULT_CATEGORY_PHOTO_PATH = 'company-assets/default-category.jpg';

    protected $fillable = [
        'company_id',
        'title',
        'text',
        'slug',
        'image',
        'image_seo',
        'order',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'status',
        'image_seo',
    ];

    public static function getNextId()
    {
        if(Category::all()->last() !== null) {
            $lastId = Category::all()->last()->id + 1;
        } else {
            $lastId = 1;
        }

        return $lastId;
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->where('status', self::STATUS_ACTIVE);
    }

    public function allProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function productsWithLimit()
    {
        return $this->hasMany(Product::class, 'category_id')->paginate(10);
    }

    public function relatedProducts(int $productId)
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->whereNotIn('id', [$productId]);
    }

}
