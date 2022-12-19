<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TovarController;
use App\Http\Controllers\TextPagesController;
use App\Http\Controllers\BascetController;
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

Route::get('/bascet', [BascetController::class, 'index'])->name('bascet');

Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites');

Route::get('/cabinet', [CabinetController::class, 'index'])->name('cabinet');
Route::get('/search_pds', [SearchController::class, 'search_pds'])->name('search_pds');

