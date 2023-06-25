<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

use App\Filters\ProductFilter;


class ActionController extends Controller
{
    public function index(ProductFilter $request) {
        $all_product = Product::where('old_price', "!=", 0)->filter($request)->paginate(16)->withQueryString();
        $all_brend = Product::select('brand')->groupBy('brand')->get();
        $top_categorys = Category::where('parent', "")->get();

        return view('actions', ['sub_cat'=> $top_categorys, 'tovars' => $all_product, "brand_list" => $all_brend]);
    }
}
