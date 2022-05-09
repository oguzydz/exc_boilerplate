<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    const EXAMPLE_LOGO_URL = 'company-assets/example-logov.jpg';
    const EXAMPLE_BG_URL   = 'company-assets/example-bg.png';

    const PERSONAL_SUB_MERCHANT_TYPE        = 1;
    const PRIVATE_SUB_MERCHANT_TYPE         = 2;
    const LIMITED_COMPANY_SUB_MERCHANT_TYPE = 3;

    public $fillable = [
        'user_id',
        'title',
        'text',
        'logo',
        'bg_image',
        'email',
        'phone',
        'slug',
        'corporate_name',
        'tax_office',
        'taxpayer_identification_number',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'        => 'date:d-m-Y H:i',
        'updated_at'        => 'date:d-m-Y H:i',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function activeCategories()
    {
        return $this->hasMany(Category::class)->where('status', Category::STATUS_ACTIVE);
    }

    public function pasiveCategories()
    {
        return $this->hasMany(Category::class)->where('status', Category::STATUS_PASIVE);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function activeProducts()
    {
        return $this->hasMany(Product::class)->where('status', Product::STATUS_ACTIVE);
    }

    public function pasiveProducts()
    {
        return $this->hasMany(Product::class)->where('status', Product::STATUS_PASIVE);
    }
}
