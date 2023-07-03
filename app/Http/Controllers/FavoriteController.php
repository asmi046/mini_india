<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Favorite;

use Illuminate\Support\Facades\Storage;

class FavoriteController extends Controller
{
    public function add(Request $request) {
        $product_id = $request->input('product_id');
        $_token = $request->input('_token');

        $rez = Favorite::add($product_id);

        return array($rez, $product_id, $_token);
    }

    public function index() {
        $fav_product = Favorite::with('tovar_data')->where("favorites.session_id", session()->getId())->get();
        return view('favorites', ["products" => $fav_product]);
    }

    public function get_all() {
        $fav_product = Favorite::with('tovar_data')->where("favorites.session_id", session()->getId())->get();

        foreach ($fav_product as $item) {
            if(Storage::disk('public')->exists($item->tovar_data->img))
                $item->tovar_data['trueImgSrc'] = Storage::url($item->tovar_data->img);
            else $item->tovar_data['trueImgSrc'] = "";
            $item->tovar_data['trueLnk'] = route('tovar', $item->tovar_data->slug);
        }

        return ["count" => count($fav_product), "position" => $fav_product] ;
    }

    public function clear() {
        return Favorite::favorites_clear();
    }

    public function delete(Request $request) {
        $product_id = $request->input('product_id');
        return Favorite::delete_favorite($product_id);
    }
}
