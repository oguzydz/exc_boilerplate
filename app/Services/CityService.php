<?php
namespace App\Services;

use App\Models\City;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Permission\Models\Role;
use Throwable;

class CityService
{
    public function findCityCounties(int $cityId)
    {
        try {
            $city = City::find($cityId);
            $cityCounties = $city->counties;

            return $cityCounties;
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}
