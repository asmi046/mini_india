<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Option;

use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $all_options = Option::all();

        $opt = [];

        foreach ($all_options as $otion) {
            $opt[$otion['name']] = $otion['value'];
        }

// dd($opt);
        View::share('options', $opt);
    }

}
