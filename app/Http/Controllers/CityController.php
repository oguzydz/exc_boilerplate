<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function cityCounties(int $cityId, CityService $cityService)
    {
        try {
            $cityCounties = $cityService->findCityCounties($cityId);

            return response()->json($cityCounties);
        } catch (Request $e) {
            return redirect()->back()->with('toast_error', 'Hata..!');
        }
    }
}
