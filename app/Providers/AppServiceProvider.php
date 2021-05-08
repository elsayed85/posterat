<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//        view()->composer('*', function ($view) {
//            $view->with('site_setting', Setting::all()->pluck('var', 'name'));
//        });
        view()->composer([
            'frontend.layouts.master-has-slider',
            'frontend.layouts.single-ad',
            'frontend.layouts.single-category',
            'frontend.categories.index',
            //'frontend.home.index'
        ], function ($view) {
            $view->with('categories', Category::RootCategories())
                ->with('menu_categories', Category::IsMenu())
                ->with('pages',Page::where('published',1)->where('type_is','<>','popup')->orderBy('order_is')->get());
        });

    }
}
