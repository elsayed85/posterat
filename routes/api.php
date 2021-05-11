<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\BalancePackageController;
use App\Http\Controllers\Api\V1\BookmarkController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\LikeController;
use App\Http\Controllers\Api\v1\User\MeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => "v1", 'as' => 'v1.'], function () {
    Route::middleware(['guest'])->group(function () {
        Route::post('register', [AuthController::class, "register"])->name('register');
        Route::post('login', [AuthController::class, "login"])->name('login');
        Route::post('forget-password', [AuthController::class, "forgetPassword"])->name('forget_password');
    });

    Route::middleware(['auth:sanctum'])->prefix('user')->as('user.')->group(function () {
        Route::get('me', [MeController::class, "me"])->name('me');
        Route::get('favourite', [MeController::class, "favourite"])->name('favourite');
        Route::get('userads/{user}', [MeController::class, "userads"])->name('userads');
        Route::get('myads', [MeController::class, "myads"])->name('myads');
        Route::get('mysaved', [MeController::class, "mysaved"])->name('mysaved');
        Route::post('logout', [AuthController::class, "logout"])->name('logout');
        Route::get('statuses', [MeController::class, "statuses"])->name('statuses');
        Route::post('update-avatar', [MeController::class, "updataAvatar"])->name('updata_avatar');
        Route::post('update-info', [MeController::class, "updateInfo"])->name('update_info');
        Route::post('change-password', [MeController::class, "changePassword"])->name('change_password');
        Route::post('verify-email', [MeController::class, "verifyEmail"])->name('verify_email');

        Route::get('packages', [BalancePackageController::class, "index"])->name('packages.index');
        Route::get('packages/{package}', [BalancePackageController::class, "show"])->name('packages.show');

        Route::post('like', [LikeController::class, "store"])->name('likes.store');
        Route::delete('likes/{like}', [LikeController::class, "destroy"])->name('likes.destroy');

        Route::get('categories', [CategoryController::class, "index"])->name('categories.index');
        Route::get('categories/{category}', [CategoryController::class, "show"])->name('categories.show');

        Route::apiResource('bookmarks', "Api\V1\BookmarkController")->names('bookmarks');
        Route::apiResource('city', "Api\V1\CityController")->names('city');
        Route::apiResource('coupon', "Api\V1\CouponController")->names('coupon');
    });
});
