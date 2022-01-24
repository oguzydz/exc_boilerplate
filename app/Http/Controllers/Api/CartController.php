<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function add(int $productId)
    {
        return $this->cartService->addToCart($productId);
    }

    public function update(string $rowId, int $qty)
    {
        return $this->cartService->updateQty($rowId, $qty);
    }

    public function remove(string $rowId)
    {
        return $this->cartService->removeFromCart($rowId);
    }
}
