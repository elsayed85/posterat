<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('debug/{mode?}', function ($mode) {
    if (isset($mode) && $mode == 'on') {
        session(['debug' => true]);
    } else {
        session(['debug' => false]);
    }

    dump(config('app.debug'));
});
Route::post('subcat', function () {
    //if(!cache('s')){cache(['s'=>'1']);}
    $parent_id = request('id');
    $subcategories = [];
    if ($parent_id > 1) {
        $subcategories = \App\Models\Category::where('parent', $parent_id)->get();
    }
    return response()->json([
        'subcategories' => $subcategories
    ]);
})->name('subcat');
Route::get('image/upload', 'ImageUploadController@fileCreate');
Route::post('image/upload/store', 'ImageUploadController@fileStore')->name('image_upload');
Route::post('image/delete', 'ImageUploadController@fileDestroy')->name('image_delete');


Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return "clear done";
});
Route::get('/flash', function () {
    Artisan::call('migrate:fresh --seed');
    return "flash done";
});
Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, config('setting.lang_code'))) //['ar','en']
    {
        \Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('language');

//Route::post('dolike', function() {
//    $msg = "You Liked This Ad";
//
////dd($request);
//
//    $like = \App\Models\Like::firstOrNew(['ad_id'=> request('ad_id'),
//        'user_id'=> auth()->user()->id]);
//    $add=0;
//    if(!$like->count()){
//        $like->save();
//        $ad = \App\Models\Ad::find(request('ad_id'));
//        $ad->increment('total_likes');
//        $add=1;
//    }else{
//        $like->delete();
//        $ad = \App\Models\Ad::find(request('ad_id'));
//        $ad->decrement('total_likes');
//        $add=-1;
//    }
//
//    return response()->json(array('msg'=>$add), 200);
//
//})->name('dolike');

Route::get('/', 'Front\HomeController@index')->name('index');
Route::get('/search', 'Front\HomeController@search')->name('search');




Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

//Route::namespace('Front')->middleware(['auth','verified'])
Route::namespace('Front')->middleware(['auth', 'verified'])
    ->group(function () {

        Route::post('upload/images', 'AdController@uploadImages')->name('ads.upload.images');
        Route::post('upload/main-image', 'AdController@uploadMainImage')->name('ads.upload.main_image');
        Route::post('ads/delete-images', 'AdController@deleteImages')->name('ads.delete.images');
        Route::post('ads/delete-main-image', 'AdController@deleteMainImage')->name('ads.delete.main-image');
        Route::get('pay/plan/success', 'PlanController@successPayment')->name('plan.success');
        Route::get('pay/plan/failed', 'PlanController@failedPayment')->name('plan.failed');
        Route::get('plan/{id}', 'PlanController@plan')->name('ads.plan');
        Route::post('plan/{id}', 'PlanController@planPublish')->name('plan.publish');
        Route::resource('ads', 'AdController')->except(['show']);

        //Route::get('pay/success', 'PlanController@successPayment')->name('pay.success');

        Route::get('profile', 'UserController@edit')->name('profile');
        Route::post('profile', 'UserController@update')->name('profile.update');
        Route::get('myphoto', 'UserController@photo')->name('myphoto');
        Route::post('myphoto', 'UserController@updatePhoto')->name('myphoto.update');
        Route::resource('likes', 'LikeController');
        Route::resource('bookmarks', 'BookmarkController');
        Route::resource('admessages', 'AdMessageController');
        Route::resource('adabuses', 'AdAbuseController');
        Route::get('favourite', 'UserController@favourite')->name('favourite');
        Route::get('userads/{id}', 'UserController@userads')->name('userads');
        Route::get('myads', 'UserController@myads')->name('myads');
        Route::get('mysaved', 'UserController@mysaved')->name('mysaved');
        Route::get('sold/{id}', 'UserController@sold')->name('ads.sold');
        Route::get('archive/{id}', 'UserController@archive')->name('ads.archive');

        Route::get('pay/package/success', 'BalancePackageController@successPayment')->name('package.success');
        Route::get('pay/package/failed', 'BalancePackageController@failedPayment')->name('package.failed');
        Route::get('package/current', 'BalancePackageController@currentPackage')->name('package.current');

        Route::resource('packages', 'BalancePackageController');
        Route::resource('coupons', 'CouponController');
    });
Route::namespace('Front')->group(function () {
    Route::resource('pages', 'PageController')->only(['show']);
    Route::resource('sliders', 'SliderController')->only(['show']);
    Route::resource('ads', 'AdController')->only(['show']);
    Route::resource('categories', 'CategoryController')->only(['show']);
});

Route::prefix('dashboard')
    ->namespace('Dashboard')
    ->name('dashboard.')
    ->middleware(['admin'])
    ->group(function () {

        Route::resource('/', 'DashboardController');
        Route::resource('/balancepackages', 'BalancePackageController');
        Route::resource('/pages', 'PageController');
        Route::resource('/sliders', 'SliderController');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/cities', 'CityController');
        Route::resource('/customfields', 'CustomFieldController');
        Route::resource('/users', 'UserController');
        Route::resource('/ads', 'AdController');
        Route::resource('/coupons', 'CouponController');
        Route::resource('/premiumpositions', 'PremiumPositionController');
        Route::resource('/premiumpositiondays', 'PremiumPositionDayController');
        Route::resource('settings', 'SettingController');
        Route::resource('adabuses', 'AdAbuseController');
        Route::get('/sold/{id}', 'AdController@sold')->name('ads.sold');
        Route::get('/archive/{id}', 'AdController@archive')->name('ads.archive');
        Route::post('/customfields/{id}', 'CustomFieldController@to_category')->name('customfields.to_category');

        ##TEST####TEST####TEST####TEST####TEST####TEST####TEST####TEST####TEST####TEST##
        //Route::view('custom-inputs','components.custom-inputs',['custom_inputs'=>App\Models\CustomField::where('category_id',8)->get()]);
        Route::view('/slider', 'frontend.home.simple-slider');
        Route::view('/front', 'frontend.layouts.app');
        ##TEST####TEST####TEST####TEST####TEST####TEST####TEST####TEST####TEST####TEST##
    });

Route::get('xx', function () {
    return view('frontend.users.login');
});

use  Illuminate\Support\Carbon;
use  App\Models\PremiumAd;

Route::get('error', function () {
    //    dd('error');
    $p = PremiumAd::where('to', '<', Carbon::now())->where('published', 1);
    if ($p) {
        //        foreach ($p as $ps){
        $ps = PremiumAd::where('to', '<', Carbon::now())->where('published', 1)->get();
        $p->update(['published' => 0, 'expired_at' => Carbon::now()]);
        dump($p);
        foreach ($ps as $item) {

            //    $item->category()->premium_ads_num->decrement;

            dump('was: ' . $item->category->premium_ads_num);
            $item->category->decrement('premium_ads_num');
            dump('been: ' . $item->category->premium_ads_num);
        }
    }
    dd($p);
    //}
});
//Route::view('profile','home')->name('profile');
//Route::view('messages','home')->name('messages');
//Route::view('messages','home')->name('messages');
Route::view('archives', 'home')->name('archives');
//Route::view('myads','home')->name('myads');
Route::view('deactive', 'home')->name('deactive');
Route::view('success', 'frontend.ads.success')->name('success');
//Route::view('pay/failed','frontend.pays.failed')->name('pay.failed');
//Route::get('/{page}', 'AdminController@index');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
