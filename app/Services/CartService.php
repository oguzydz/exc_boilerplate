<?php

namespace App\Services;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
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
            Cart::add($product, 1, [
                'image'    => $product->image,
                'slug'     => $product->slug,
                'company'  => $product->company->slug,
                'category' => $product->category->title,
            ]);

            return response()->json([
                'message'      => 'Ürün başarıyla sepetinize eklendi.',
                'cart'         => Cart::content(),
                'cartSubTotal' => Cart::subTotal(),
                'status'       => true,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Ürün sepete eklenemedi, lütfen tekrar deneyiniz.',
                'status'  => false,
            ], 200);
        }
    }

    /**
     * Remove product from cart
     * @param  string  $rowId;
     * @param  string  $type;
     */
    public function updateQty(string $rowId, int $qty)
    {
        try {
            Cart::update($rowId, $qty);

            return response()->json([
                'message'      => 'Ürün adedi başarıyla güncellendi.',
                'cart'         => Cart::content(),
                'cartSubTotal' => Cart::subTotal(),
                'status'       => true,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Ürün adedi güncellenemedi, lütfen tekrar deneyiniz.',
                'status'  => false,
            ], 200);
        }
    }

    /**
     * Remove product from cart
     * @param  string  $rowId;
     */
    public function removeFromCart(string $rowId)
    {
        try {
            Cart::remove(
                $rowId
            );

            return response()->json([
                'message'      => 'Ürün başarıyla sepetinizden çıkarıldı.',
                'cart'         => Cart::content(),
                'cartSubTotal' => Cart::subTotal(),
                'status' => true,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Ürün sepetten çıkarılamadı, lütfen tekrar deneyiniz.',
                'status'  => false,
            ], 200);
        }
    }

    /**
     * Product For Cart
     * @param  integer  $productId;
     */
    public function productForCart(int $productId)
    {
        $product = Product::findorFail($productId);

        return [
            'id'    => $product->id,
            'name'  => $product->title,
            'qty'   => 1,
            'price' => $product->price
        ];
    }
}
