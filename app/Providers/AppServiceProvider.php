<?php

namespace App\Providers;

use App\Model\Category;
use App\Model\Subcategory;
use App\Model\RestaurantSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('FrontEnd.*', function ($view) {

            $getCategory    = Category::GetCategory();
            $getSubCategory = Subcategory::GetSubcategory();
            $cur            = RestaurantSetting::select('fld_currency')->first();
            isset($cur->fld_currency) ? $currency = $cur->fld_currency : $currency = '';

            $view->with([
                'getCategory'       => $getCategory,
                'getSubCategory'    => $getSubCategory,
                'currency'          => $currency,

            ]);
        });


        Schema::defaultStringLength(191);
    }


    public function register()
    {
        //
    }
}
