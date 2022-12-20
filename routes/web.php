<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TovarController;
use App\Http\Controllers\TextPagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\SearchController;

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
Route::get('/category/{slug}', [CategoriesController::class, 'index'])->name('category');
Route::get('/tovar/{slug}', [TovarController::class, 'index'])->name('tovar');

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

Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites');

Route::get('/cabinet', [CabinetController::class, 'index'])->name('cabinet');
Route::get('/search_pds', [SearchController::class, 'search_pds'])->name('search_pds');

