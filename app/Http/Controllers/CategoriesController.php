<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

use App\Filters\ProductFilter;

class CategoriesController extends Controller
{
    public function index($slug, ProductFilter $request) {


        $categoryInfo = Category::where('slug', $slug)->first();

        if($categoryInfo == null) abort('404');

        $sub_categorys = Category::where('parent', $categoryInfo->title)->get();
        $category_brend = Product::select('brand')->where('category', $categoryInfo->title)->groupBy('brand')->get();


        $cat_product = $categoryInfo->category_tovars()->filter($request)->paginate(16)->withQueryString();
        // $cat_product = Product::where('category', $categoryInfo->title)->filter($request)->paginate(16)->withQueryString();


        return view('category', ['category_info' => $categoryInfo, 'sub_cat'=> $sub_categorys, 'tovars' => $cat_product, "brand_list" => $category_brend]);
    }
}
