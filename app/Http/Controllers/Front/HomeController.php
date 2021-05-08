<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ad;
//use App\Models\Category;
//use App\Models\Page;
use App\Models\PremiumAd;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
//        $categories = Category::with('children')->where('parent',NULL)->orWhere('parent',0)->orderBy('order_is')->get();
        //$pages = Page::where('published','1')->orderBy('order_is')->get();->limit(get_setting('ads_home_limit'))
//        $premium_ads = Ad::with('category','city','premium_ad')->where('published',1)->where('archived',0)->where('sold',0)->orderBy('premium','DESC')->orderBy('published_at','DESC')->get();
//        PremiumAd::where
//        $premium_ads = PremiumAd::whereBetween('recur_at', array(Carbon::now(), Carbon::now()->addWeek()))
//            ->where('status', '<', 5)
//
//            ->get();

        //category-->>>home page:'category_id',1
$premium_ads_is = PremiumAd::where('to', '>=', Carbon::now())->where('category_id',1)->where('published', 1)->get(['ad_id']);
        $premium_ads=[];
if(count($premium_ads_is)){

    $premium_ads = Ad::with('category','city')->whereIn('id',$premium_ads_is)->where('published',1)->where('archived',0)->where('sold',0)->orderBy('published_at','ASC')->get();
}
        $normal_ads = Ad::with('category','city')->whereNotIn('id',$premium_ads_is)->where('published',1)->where('archived',0)->where('sold',0)->orderBy('published_at','DESC')->paginate(get_setting('ads_home_limit'));
        //dd($ads);
        return view('frontend.home.index', compact('normal_ads','premium_ads'));
    }
    public function search(Request $request)
    {
        $ad_search = $request->input('ad_search');

        $category_search= $request->input('category_search');

        //now get all user and services in one go without looping using eager loading
        //In your foreach() loop, if you have 1000 users you will make 1000 queries

//        $ads = Ad::where('title', 'LIKE', '%' . $ad_search . '%')
//            ->with(['category', function ($query) use ($category_search) {
//
//            $query->where('id',$category_search );
//        }])->get();
///*best of best search*/
//        $ads = Ad::where('title', 'LIKE', '%' . $ad_search . '%')
//            ->whereHas('category', function($q) use ($category_search) {
//            $q->where('id',$category_search);
//        })->orWhere('title', 'LIKE', '%' . $ad_search . '%')->paginate(get_setting('ads_home_limit'));
        //return redirect()->route('index');
        $ads = Ad::where('title', 'LIKE', '%' . $ad_search . '%')->paginate(get_setting('ads_home_limit'));

        return view('frontend.home.search', compact('ads'));
    }

}
