<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\YandexDeliveryServices;

class TestController extends Controller
{
    public function index(Request $request, YandexDeliveryServices $yd) {
        $ccr = $yd->calc_price();
        dd($ccr, config('yandex.yandex_delivery_token'));
    }
}
