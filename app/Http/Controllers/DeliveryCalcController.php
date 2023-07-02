<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\YandexDeliveryServices;

class DeliveryCalcController extends Controller
{
    public function index(Request $request, YandexDeliveryServices $yd) {
        $city =  $request->input('city');
        $street =  $request->input('street');
        $home = $request->input('home');
        $postindex  =  $request->input('postindex');
        $price  =  $request->input('price');

        $dPrice = $yd->calc_price($city, $street, $home, $postindex, $price);

        return $dPrice;
    }

}
