<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class TovarController extends Controller
{
    public function index($slug) {
        $prosuct = Product::with(['tovar_category', 'product_images'])->where('slug', $slug)->first();

        if($prosuct == null) abort('404');

        $images = $prosuct->product_images;
        $up_sale = Product::where('category', $prosuct->category)->take(5)->get();


        return view('tovar', ['product' => $prosuct, "images" => $images, "upsale" => $up_sale]);
    }
}
