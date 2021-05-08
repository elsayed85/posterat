<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CouponController extends Controller
{
    public function store(Request $request)
    {
        $coupon = Coupon::where('promo_code',$request->code)
            ->where('end_date', '>=', Carbon::now())
            ->where('start_date', '<=', Carbon::now())
            ->where('active', '=', true)
            ->first();

        if (! $coupon) {
        return ['validate' => false, 'msg' => 'Sorry, that coupon is not valid.', 'discount'=>0];
        }

        return ['validate' => true, 'msg' => 'Coupon applied successfully!',
            'discount_value'=> round($coupon->discount_value, 2), 'discount_type'=>$coupon->discount_type, 'discount_limit'=>$coupon->discount_limit];

    }
}
