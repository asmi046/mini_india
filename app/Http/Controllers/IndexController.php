<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;


class IndexController extends Controller
{

    public function index() {
        $news = Product::where('new', 1)->take(4)->get();
        $sales = Product::where('old_price', "!=", 0)->take(8)->get();
        return view('index', [
            'categories' => Category::all(),
            'news' => $news,
            'sales' => $sales,
        ]);
    }
}
