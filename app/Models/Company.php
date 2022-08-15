<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

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
        'instagram',
        'facebook',
        'twitter',
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
        'created_at' => 'date:d-m-Y H:i',
        'updated_at' => 'date:d-m-Y H:i',
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

    public function product(string $productSlug)
    {
        return $this->hasOne(Product::class)->where('slug', $productSlug);
    }

    public function activeProducts()
    {
        return $this->hasMany(Product::class)->where('status', Product::STATUS_ACTIVE);
    }

    public function pasiveProducts()
    {
        return $this->hasMany(Product::class)->where('status', Product::STATUS_PASIVE);
    }

    public function subMerchant()
    {
        return $this->hasOne(SubMerchant::class);
    }

    public function cargoSetting()
    {
        return $this->hasOne(CompanyCargoSetting::class);
    }

    public function cargoPrice(bool $formatted = false)
    {
        if (!count(Cart::search(function ($cartItem) {
            return $cartItem->options->type === Product::TYPE_DEFAULT;
        }))) {
            return 0;
        }

        return $this->cargoSetting->after_free_price > Cart::subtotal(null, '.', '')
            ? ($formatted ? $this->getFormattedNumber($this->cargoSetting->price, 'pt_BR')
                : $this->cargoSetting->price) : 0;
    }

    public static function getFormattedNumber(
        $value,
        $locale = 'en_US',
        $style = NumberFormatter::DECIMAL,
        $precision = 2,
        $groupingUsed = true,
        $currencyCode = 'USD'
    ) {
        $formatter = new NumberFormatter($locale, $style);
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $precision);
        $formatter->setAttribute(NumberFormatter::GROUPING_USED, $groupingUsed);
        if ($style == NumberFormatter::CURRENCY) {
            $formatter->setTextAttribute(NumberFormatter::CURRENCY_CODE, $currencyCode);
        }

        return $formatter->format($value);
    }
}
