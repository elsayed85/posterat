<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\PremiumAd;
use App\Traits\UPayments;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PlanController extends Controller
{
    use UPayments;
    public function plan($id)
    {
        $ad = Ad::findOrFail($id);

        if($ad->category->deep > 1) {
            $d = (Category::with('parentCategory')->with('premiumPositionDays')->with('premiumPosition')->where('id', $ad->category->id)->first());
            $parent_cats = [];

            while (isset($d) && $d->has('parentCategory')) {

                if ($d )
                    array_push($parent_cats,  $d);
                $d = $d->parentCategory;

            }
            // $parent_cats = array_reverse($parent_cats);
        }else{
            $parent_cats[] = (Category::with('premiumPositionDays')->with('premiumPosition')->where('id', $ad->category->id)->first());
        }
        $parent_cats =(array_reverse($parent_cats));

        $published_premium_ads_update= PremiumAd::where('to', '<', Carbon::now())->where('published', 1);
        if($published_premium_ads_update) {
            $published_premium_ads_cat = PremiumAd::where('to', '<', Carbon::now())->where('published', 1)->get();
            $published_premium_ads_update->update(['published'=> 0 ,'expired_at' => Carbon::now()]);

            foreach ($published_premium_ads_cat as $item){


//                dump('was: '.$item->category->premium_ads_num);
                $item->category->decrement('premium_ads_num');
//                dump('been: '.$item->category->premium_ads_num);

            }

        }

        return view('frontend.plans.show',compact('ad','parent_cats'));
    }

    public function planPublish($id,Request $request)
    {
       if($request->featured) {
           $request->validate([
               'plan' => 'required',
           ]);

           if (str_contains($request->plan, '_')) {
               list($plan, $category) = explode('_', $request->plan);
               if (is_numeric($plan) && is_numeric($category)) {
                   $request->merge(['plan_id' => $plan, 'category_id' => $category]);
               }
               $request->validate([
                   'category_id' => 'required|integer',
                   'plan_id' => 'required|integer',
               ]);
           } else {
               redirect()->back();
           }
           //dd($request->all());
           $payfor = Category::with(["premiumPositionDays" => function ($q) use ($request) {
               $q->where(['premium_position_days.id' => $request->plan_id]);
           }])->where('id', $request->category_id)->first();//unique -deep -days
           //dd($payfor);
           $payment_mode = get_setting('payment_mode');
           $payment = $this->setMode($payment_mode);
//           $this->testCustomer();
//$this->testProduct();
           $user = auth()->user();
           $premium_ad = PremiumAd::where([
               'ad_id' => $request->ad_id,
               'user_id' => $user->id])->first();
           if (isset($premium_ad) && $premium_ad->published) {
               session()->flash('status', 'إعلانك منشور بالفعل فى الاعلانات المميزة');
               return view('frontend.pays.status');
           }

           /************/
           $promo_code = NULL; $discount_value = 0;
           $total_price = $payfor->premiumPositionDays[0]->days_cost ;
           if($request->has('coupon') && $request->coupon !=''){
               $coupon = Coupon::where('promo_code',$request->coupon)
                   ->where('end_date', '>=', Carbon::now())
                   ->where('start_date', '<=', Carbon::now())
                   ->where('active', '=', true)->firstOrFail();
               if($coupon){
                   $coupon->active=false;
                   $coupon->save();
                   $promo_code = $coupon->promo_code; $discount_value = $coupon->discount_value;

                   if($coupon->discount_type == 'percent'){
                       $discount_value = ($total_price * $discount_value/100);
                       $total_price = $total_price - $discount_value;
                       $total_price = round($total_price,0,PHP_ROUND_HALF_DOWN);
                   }else{

                       $total_price = ($total_price > $discount_value)? ($total_price - $discount_value):($total_price);
                       $total_price = round($total_price,0,PHP_ROUND_HALF_DOWN);
                   }
               }
           }

           /*************/
           $premium_ad = PremiumAd::updateOrCreate([
               'ad_id' => $request->ad_id,
               'user_id' => $user->id,
               'published' => '0'

           ],
               [
                   'premium_position_day_id' => $payfor->premiumPositionDays[0]->id,
                   'category_id' => $request->category_id,
                   'from' => Carbon::now(),
                   'to' => Carbon::now()->addDays($payfor->premiumPositionDays[0]->days),
                   'price' => $payfor->premiumPositionDays[0]->days_cost,
                   'promo_code' => $promo_code,
                   'discount_value' => $discount_value,
                   'total_price' => $total_price,
                   'published_at' => Carbon::now(),
               ]
           );

           session(['OrderID' => $payment->OrderID]);
           session(['cust_ref' => $premium_ad->id]);

           $payment->fillProduct('إعلان مميز ' . $payfor->premiumPositionDays[0]->days . ' يوم', $payfor->premiumPositionDays[0]->days, $total_price);
           $payment->fillCustomer($user->full_name, $user->email, get_setting('pre_phone') . $user->phone, $premium_ad->id);
           $payment->success_url = route('plan.success');
           $payment->error_url = route('plan.failed');
           $payment->doPayment();

           return redirect($payment->redirect_url);


       }
        $ad = Ad::findOrFail($id);
        $ad->published=1;         $ad->published_at = Carbon::now();

        $ad->save();
        $user = auth()->user();
        $user->points+=get_setting('ad_points');
        $user->save();

        session()->flash('status',trans('ad.your ad published successfuly'));
        session()->flash('type', 'success');
        return view('frontend.ads.success');
    }
    public function successPayment()
    {
//        dump(request()->fullUrl());
//        dump(request()->all());
        // dd(request()->all());
        if (session('OrderID') && request('OrderID')) {
            if (request('OrderID') == session('OrderID')) {
                $premium_ad = PremiumAd::findOrfail(session('cust_ref'));

                $premium_ad->response = json_encode(request()->all(), true);
                $premium_ad->published = 1;
                $premium_ad->save();
                $ad = Ad::findOrFail($premium_ad->ad_id);
                $ad->published=1;
                $ad->published_at = Carbon::now();
                $ad->premium = 1;
                $ad->save();
                $premium_ad->category()->increment('premium_ads_num');//category table

                //dd(request()->all());
                session()->forget(['OrderID']);
                session()->flash('status', 'تم الدفع بنجاح');
                session()->flash('type', 'success');
                return view('frontend.pays.status');
            }
        }
        session()->flash('status', 'تم الدفع من قبل');
        session()->flash('type', 'info');
        return view('frontend.pays.status');
    }

    public function failedPayment()
    {
        if (request('cust_ref')) {
            $premium_ad = PremiumAd::findOrfail(session('cust_ref'));
            $premium_ad->response = json_encode(request()->all(), true);
            $premium_ad->save();

        }
        session()->flash('status', 'خطأ فى الدفع');
        session()->flash('type', 'error');
        return view('frontend.pays.status');
    }
        //$cost =PremiumPositionDay::whereIn('id',$selected_plans)->where('published',1)->sum('days_cost');


}
/**
 * http://ads.localhost/success?
PaymentID=100202104422662228&
Result=CAPTURED&
PostDate=0214&
TranID=202104422786150&
Ref=104410000496&
TrackID=b1ae2951e99e4abb251ee755f83ba51b&
Auth=B54572&
OrderID=1613245099&
cust_ref=Ref1613245099&
trnUdf=

 */