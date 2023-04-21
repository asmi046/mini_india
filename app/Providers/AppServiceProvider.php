<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;



use Illuminate\Support\Facades\View;

use App\Models\Option;
use App\Models\Category;
use App\Models\Brand;

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
        // $all_options = Option::all();
        // $brands = Brand::all();
        // $categoryes = Category::all();

        // $opt = [];

        // foreach ($all_options as $otion) {
        //     $opt[$otion['name']] = $otion['value'];
        // }
        // View::share('options', $opt);
        // View::share('all_cat', $categoryes);
        // View::share('brands', $brands);
    }
}
