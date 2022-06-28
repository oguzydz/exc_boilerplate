<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckCheckout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Cart::subtotal(null, '.', '') <= 0) {
            return redirect()->back()->with('toast_error', 'Ödeme yapmanız için sepetiniz dolu olması gerekir.');
        }

        return $next($request);
    }
}
