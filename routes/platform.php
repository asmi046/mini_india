<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

use App\Orchid\Screens\Brand\BrandScreen;
use App\Orchid\Screens\Categories\CategoriesListScreen;
use App\Orchid\Screens\Product\ProductsScreen;
use App\Orchid\Screens\Product\EditProductScreen;
use App\Orchid\Screens\Product\CreateProductScreen;
use App\Orchid\Screens\Order\OrderListScreen;
use App\Orchid\Screens\Order\OrderEditScreen;
use App\Orchid\Screens\SiteVisual\MainBannersScreen;
use App\Orchid\Screens\TextEditScreen;
use App\Orchid\Screens\AdvantagesScreen;

use App\Orchid\Screens\Blog\BlogCreateScreen;
use App\Orchid\Screens\Blog\BlogEditScreen;
use App\Orchid\Screens\Blog\BlogListScreen;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

Route::screen('/brand', BrandScreen::class)->name('platform.brand')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Бренды')));

Route::screen('/categories', CategoriesListScreen::class)->name('platform.categories')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Категории')));

// Заказы

Route::screen('/orders', OrderListScreen::class)->name('platform.orders')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Заказы'), route('platform.orders')));

Route::screen('/orders/{id}/edit', OrderEditScreen::class)->name('platform.orders.edit')
    ->breadcrumbs(fn (Trail $trail, $id) => $trail
        ->parent('platform.orders')
        ->push(__('Просмотр заказа'), route('platform.orders.edit', $id)));

// Заказы end

//Блог

Route::screen('/blog', BlogListScreen::class)
    ->name('platform.blog')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Блог'), route('platform.blog')));

Route::screen('/blog/{id}/edit', BlogEditScreen::class)
    ->name('platform.blog_edit')->breadcrumbs(fn (Trail $trail, $id) => $trail
    ->parent('platform.blog')
    ->push(__('Редактирование статьи'), route('platform.blog_edit', $id)));

Route::screen('/blog/create', BlogCreateScreen::class)
    ->name('platform.blog_create')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.blog')
    ->push(__('Добавление статьи'), route('platform.blog_create')));


Route::screen('/products', ProductsScreen::class)->name('platform.products')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Продукты'), route('platform.products')));

Route::screen('/products/{id}/edit', EditProductScreen::class)->name('platform.products.edit')
    ->breadcrumbs(fn (Trail $trail, $id) => $trail
        ->parent('platform.products')
        ->push(__('Редактирование продукта'), route('platform.products.edit', $id)));

Route::screen('/products/create', CreateProductScreen::class)->name('platform.products.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.products')
        ->push(__('Создание продукта'), route('platform.products.create')));

Route::screen('/mainbanner', MainBannersScreen::class)->name('platform.mainbanner')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Баннеры')));

Route::screen('/text-edit/{id}/edit', TextEditScreen::class)->name('platform.textedit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Редактирование текстового контента')));

Route::screen('/advantages', AdvantagesScreen::class)->name('platform.advantages')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Преимущество')));

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push(__('User'), route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Role'), route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example screen'));

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
