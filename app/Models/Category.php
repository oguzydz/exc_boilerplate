<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
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
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function productsWithLimit()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->limit(3);
    }

    public function relatedProducts(int $productId)
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->whereNotIn('id', [$productId]);
    }

}
