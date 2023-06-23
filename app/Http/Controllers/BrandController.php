<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Product;

use App\Filters\ProductFilter;



class BrandController extends Controller
{
    public function index($slug, ProductFilter $request) {

        // dd($request->request->input('minprice'));
        $brandInfo = Brand::where('slug', $slug)->first();

        if($brandInfo == null) abort('404');

        $brand_product = Product::where('brand', $brandInfo->title)->filter($request)->paginate(16)->withQueryString();

        return view('brand', ['brand_info' => $brandInfo, 'tovars' => $brand_product]);
    }

    public function all_brand() {

        $brands = Brand::all();
        return view('all-brand', ["brands"=>$brands]);
    }
}
