<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Filters\ProductFilter;

use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(ProductFilter $request) {
        $all_product = Product::select()->filter($request)->paginate(16)->withQueryString();
        $all_brend = Product::select('brand')->groupBy('brand')->get();
        $top_categorys = Category::where('parent', "")->get();

        return view('shop', ['sub_cat'=> $top_categorys, 'tovars' => $all_product, "brand_list" => $all_brend]);
    }
}
