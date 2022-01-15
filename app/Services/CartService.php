<?php
namespace App\Services;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Jenssegers\Agent\Agent;
use Spatie\Permission\Models\Role;
use Throwable;

class CartService
{
    /**
     * Add product to cart
     * @param int $productId;
     */
    public function addToCart(int $productId)
    {
        $product = Product::findorFail($productId);

        try {
            Cart::add($product);
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

    public function productForCart(int $productId)
    {
        $product = Product::findorFail($productId);
        return [
            'id' => $product->id,
            'name' => $product->title,
            'qty' => 1,
            'price' => $product->price
        ];
    }
}
