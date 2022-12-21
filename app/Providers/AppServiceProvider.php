<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Option;

use Illuminate\Support\Facades\View;

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
        $all_options = Option::all();

        $opt = [];

        foreach ($all_options as $otion) {
            $opt[$otion['name']] = $otion['value'];
        }
        View::share('options', $opt);
    }
}
