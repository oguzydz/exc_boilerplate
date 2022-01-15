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
        try {
            $product = Product::findorFail($productId);
            Cart::add([
                $product
            ]);

            return response()->json([
                'message' => 'Ürün başarıyla sepetinize eklendi.',
                'status' => true,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Ürün sepete eklenemedi, lütfen tekrar deneyiniz.',
                'status' => false,
            ], 200);
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
