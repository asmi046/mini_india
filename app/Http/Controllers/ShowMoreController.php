<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Filters\ProductFilter;

class ShowMoreController extends Controller
{
    public function index(ProductFilter $request) {
        $catId = $request->request->input('catid');
        $inpage = $request->request->input('inpage');
        $addcount = $request->request->input('addcount');


        $categoryInfo = Category::where('id', $catId)->first();

        $cat_product = Product::where('category', $categoryInfo->title)->filter($request)->offset($inpage)->take($addcount)->get();

        return ["product" => $cat_product];
    }
}
