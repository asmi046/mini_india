<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TovarController;
use App\Http\Controllers\TextPagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PaymentController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ActionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/actions', [ShopController::class, 'index'])->name('actions');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/category/{slug}', [CategoriesController::class, 'index'])->name('category');
Route::get('/brand/{slug}', [BrandController::class, 'index'])->name('brand');
Route::get('/all_brand', [BrandController::class, 'all_brand'])->name('all_brand');
Route::get('/tovar/{slug}', [TovarController::class, 'index'])->name('tovar');

Route::get('/blog', [BlogController::class, "show"])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, "show_page"])->name('blog_page');

Route::get('/contacts', [TextPagesController::class, 'contacts'])->name('contacts');
Route::get('/obmen-vozvrat', [TextPagesController::class, 'obmen'])->name('obmen-vozvrat');
Route::get('/delivery', [TextPagesController::class, 'delivery'])->name('delivery');
Route::get('/policy', [TextPagesController::class, 'policy'])->name('policy');

Route::get('/bascet/thencs', [CartController::class, "thencs"])->name("bascet_thencs");
Route::get('/bascet', [CartController::class, "index"])->name("bascet");
Route::post('/bascet/add', [CartController::class, "add"])->name("bascet_add");
Route::post('/bascet/update', [CartController::class, "update"])->name("bascet_update");
Route::get('/bascet/get', [CartController::class, "get_all"])->name("bascet_get");
Route::delete('/bascet/clear', [CartController::class, "clear"])->name("bascet_clear");
Route::delete('/bascet/delete', [CartController::class, "delete"])->name("bascet_delete");
Route::post('/bascet/send', [CartController::class, "send"])->name("bascet_send");


Route::get('/favorites', [FavoriteController::class, "index"])->name("favorites");
Route::get('/favorites/get', [FavoriteController::class, "get_all"])->name("favorites_get");
Route::post('/favorites/add', [FavoriteController::class, "add"])->name("favorites_add");
Route::delete('/favorites/delete', [FavoriteController::class, "delete"])->name("favorites_delete");
Route::delete('/favorites/clear', [FavoriteController::class, "clear"])->name("favorites_clear");

Route::get('/search_pds', [SearchController::class, 'search_pds'])->name('search_pds');
Route::get('/search', [SearchController::class, 'show_search_page'])->name('show_search_page');

Route::get('/pay_confirm', [PaymentController::class, 'pay_confirm'])->name('pay_confirm');



Route::middleware('auth')->group(function () {
    Route::get('/cabinet', [CabinetController::class, "show_cabinet_main"])->name("cabinet.home");
    Route::get('/cabinet/orders', [CabinetController::class, "show_cabinet_orders"])->name("cabinet.orders");

    Route::get('/logout', [AuthController::class, "logout"])->name("logout");
    Route::post('/save_user', [AuthController::class, "save_user_data"])->name("save_user_data");
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, "show_login_form"])->name("login");
    Route::post('/login_do', [AuthController::class, "login"])->name("login_do");

    Route::get('/passrec', [AuthController::class, "show_passrec_form"])->name("passrec");
    Route::post('/pass_rec_do', [AuthController::class, "pass_req"])->name("pass_rec_do");

    Route::post('/register_do', [AuthController::class, "register"])->name("register_do");
    Route::get('/register', [AuthController::class, "show_register_form"])->name("register");
});
