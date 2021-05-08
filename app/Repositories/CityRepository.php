<?php

namespace App\Repositories;

use App\Http\Resources\CityResource;
use App\Models\City;

class CityRepository
{
    public function all()
    {
        $cities = CityResource::collection(City::where('published',1)->get());
            if (!$cities->isEmpty()) {
                return response()->json([
                'status' => 200,
                'cities' => $cities
                ]);
            }

        return response()->json(['status' => 404,'message'=>'not found any city']);

    }    
    public function findById($id)
    {

        $city = CityResource::collection(
            City::where('published',1)->where('id', $id)->get()
        );
        if (!$city->isEmpty()) {

            return response()->json(['status' => 200, 'city' => $city]);

        }

        return response()->json(['status' => 404,'message'=>'this city not found or not available']);
    }
   

}
