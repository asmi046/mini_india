<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Filters\ProductFilter;

use Illuminate\Support\Facades\Storage;

class ShowMoreController extends Controller
{
    public function index(ProductFilter $request) {
        $catId = $request->request->input('catid');
        $inpage = $request->request->input('inpage');
        $addcount = $request->request->input('addcount');


        $categoryInfo = Category::where('id', $catId)->first();

        $cat_product = Product::where('category', $categoryInfo->title)->filter($request)->offset($inpage)->take($addcount)->get();

        foreach ($cat_product as $item) {
            if(Storage::disk('public')->exists($item->img))
                $item['trueImgSrc'] = Storage::url($item->img);
            else $item['trueImgSrc'] = "";
            $item['trueLnk'] = route('tovar', $item->slug);
        }

        return ["product" => $cat_product];
    }
}
