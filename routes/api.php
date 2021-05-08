<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['/v1/balancepackages'=> 'api\v1\BalancePackageController'],['only' => ['index', 'show']]);
Route::apiResources(['/v1/categories' => 'Api\v1\CategoryController'], ['only' => ['index', 'show']]);

Route::apiResources(['/v1/bookmarks' => 'Api\v1\BookmarkController']);

Route::apiResources(['/v1/coupons' => 'Api\v1\CouponController']);

Route::apiResources(['/v1/cities' => 'Api\v1\CityController']);

Route::apiResources(['/v1/likes' => 'Api\v1\LikeController'], ['only' => ['store', 'destroy']]);

Route::get('/v1/open', 'Api\v1\DataController@open');//test
Route::prefix('/v1/')
    ->namespace('Api\v1')
    ->middleware(['jwt.verify'])
    ->group(function () {

        Route::get('logout', 'UserController@logout');
        Route::get('closed', 'DataController@closed');//test

    });
Route::prefix('/v1/')
    ->namespace('Api\v1')
    ->group(function () {
        Route::post('register', 'UserController@register');
        Route::post('login', 'UserController@authenticate');
        Route::post('password/reset', 'ResetPasswordController@recover')->name('password.reset');
        Route::post('password/change', 'PasswordResetRequestController@passwordResetProcess');
//        Route::post('update/user/{id}', 'UserController@update');
    });
//Route::group(['middleware' => ['jwt.verify']], function() {
//Route::post('update/user/{id}', 'Api\v1\UserController@update');
//Route::get('logout', 'Api\v1\UserController@logout');
//
//
//Route::get('closed', 'Api\v1\DataController@closed');//test
////Route::get('user', 'Api\v1\UserController@getAuthenticatedUser');
//});

