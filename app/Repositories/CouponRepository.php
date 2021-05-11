<?php

namespace App\Repositories;

use App\Http\Resources\CouponResource;
use App\Models\City;
use App\Models\Coupon;

class CouponRepository
{
    public function all()
    {
        $cities = CouponResource::collection(Coupon::all());
        if (!$cities->isEmpty()) {
            return success([
                'coupons' => $cities
            ]);
        }

        return failed('not found any coupons', [], 404);
    }
    public function findById($id)
    {
        $coupon = CouponResource::collection(
            Coupon::where('id', $id)->get()
        );

        if (!$coupon->isEmpty()) {
            return success($coupon);
        }

        return failed('this coupon not found or not available', [], 404);
    }
}
