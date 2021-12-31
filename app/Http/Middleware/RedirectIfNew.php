<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNew
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->status != User::STATUS_ACTIVE) {
            switch (Auth::user()->status) {
                case (User::STATUS_READY):
                    return redirect(route(RouteServiceProvider::USER_STATUS_CONFIRMATION));
                    break;
                default:
                    return redirect(route(RouteServiceProvider::USER_STATUS_CONFIRMATION));
                    break;
            }
        }

        return $next($request);
    }
}
