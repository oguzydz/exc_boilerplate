<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        Auth::logout();
        if (!Auth::check()) {
            if (!$request->expectsJson() && $request->inertia()) {
                abort(409, '', ['X-Inertia-Location' => url()->route('home')]);
            } elseif (!$request->expectsJson()) {
                return route('home');
            }
        }
    }
}
