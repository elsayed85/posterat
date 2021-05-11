<?php

namespace App\Repositories;

use App\Http\Resources\CityResource;
use App\Models\City;

class CityRepository
{
    public function all()
    {
        $cities = CityResource::collection(City::where('published', 1)->get());
        if (!$cities->isEmpty()) {
            return success([
                'cities' => $cities
            ]);
        }

        return failed('not found any city', [], 404);
    }
    public function findById($id)
    {

        $city = CityResource::collection(
            City::where('published', 1)->where('id', $id)->get()
        );

        if (!$city->isEmpty()) {
            return success($city);
        }

        return failed('this city not found or not available', [], 404);
    }
}
