<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BalancePackage;
use App\Models\Coupon;
use App\Models\User;
use App\Models\UserPaidBalancePayment;
use App\Traits\UPayments;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BalancePackageController extends Controller
{
    use UPayments;
    public function index(){
        $user =auth()->user();

//        if ($user->paid_balance > 0) {
//            if (!is_null($user->paid_expired_at) && Carbon::parse($user->paid_expired_at)->gt(Carbon::now())) {
//
//                return view('frontend.balance_packages.current');
//            }
//        }
        $balance_packages = BalancePackage::active()->get(); $i=0;
        return view('frontend.balance_packages.index',compact('balance_packages','i'));
    }
    public function currentPackage(){
        $user =auth()->user();
        $current_package = UserPaidBalancePayment::where('user_id',$user->id)->latest()->first(); $i=0;
        return view('frontend.balance_packages.current',compact('current_package','i'));
    }
    public function store(Request $request){
        $balance_package =   BalancePackage::findOrFail($request->balance_package);
        /************/
        $promo_code = NULL; $discount_value = 0;
        $total_price = $balance_package->price ;
        if($request->has('coupon') && $request->coupon !=''){
            $coupon = Coupon::where('promo_code',$request->coupon)
                ->where('end_date', '>=', Carbon::now())
                ->where('start_date', '<=', Carbon::now())
                ->where('active', '=', true)->first();
            //dd($coupon);
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
        $user = auth()->user();
        $user_paid_balance_payment = UserPaidBalancePayment::create([
            'paid_balance_charge' => $balance_package->amount,
            'paid_balance_current' => $user->paid_balance,
            'price' => $balance_package->price,
            'promo_code' => $promo_code,
            'discount_value' => $discount_value,
            'total_price' => $total_price,
            'expires_at' => Carbon::now()->addDays(30),
            'user_id' => $user->id
        ]);
        $payment_mode = get_setting('payment_mode');
        $payment = $this->setMode($payment_mode);
        session(['OrderID' => $payment->OrderID]);
        session(['cust_ref' => $user_paid_balance_payment->id]);

        $payment->fillProduct(' رصيد إعلانات ' . $balance_package->title , $balance_package->amount, $total_price);
        $payment->fillCustomer($user->full_name, $user->email, get_setting('pre_phone') . $user->phone, $user_paid_balance_payment->id);
        $payment->success_url = route('package.success');
        $payment->error_url = route('package.failed');
        $payment->doPayment();

        return redirect($payment->redirect_url);



    }

    public function successPayment()
    {
//        dump(request()->fullUrl());
//        dump(request()->all());
        // dd(request()->all());
        if (session('OrderID') && request('OrderID')) {
            if (request('OrderID') == session('OrderID')) {
                $user_paid_balance_payment = UserPaidBalancePayment::findOrfail(session('cust_ref'));

                $user_paid_balance_payment->response = json_encode(request()->all(), true);
                $user_paid_balance_payment->save();
                $paid_expired_at = get_setting('paid_expired_at');
                $user = User::findOrFail(auth()->user()->id);
                $user->paid_balance += $user_paid_balance_payment->paid_balance_charge;
                $user->paid_expired_at = Carbon::now()->addDays($paid_expired_at);
                $user->save();
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
            $user_paid_balance_payment = UserPaidBalancePayment::findOrfail(session('cust_ref'));
            $user_paid_balance_payment->response = json_encode(request()->all(), true);
            $user_paid_balance_payment->save();

        }
        session()->flash('status', 'خطأ فى الدفع');
        session()->flash('type', 'error');
        return view('frontend.pays.status');
    }
}
