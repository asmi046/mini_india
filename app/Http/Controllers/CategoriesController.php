<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

use App\Filters\ProductFilter;

class CategoriesController extends Controller
{
    public function index($slug, ProductFilter $request) {

        // dd($request->request->input('minprice'));
        $categoryInfo = Category::where('slug', $slug)->first();

        if($categoryInfo == null) abort('404');

        $cat_product = Product::where('category', $categoryInfo->title)->filter($request)->paginate(16)->withQueryString();
// dd($cat_product);
        return view('category', ['category_info' => $categoryInfo, 'tovars' => $cat_product]);
    }
}
