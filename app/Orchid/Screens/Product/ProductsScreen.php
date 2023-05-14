<?php

namespace App\Orchid\Screens\Product;

use App\Orchid\Layouts\Product\ProductListTable;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Link;

use Orchid\Screen\Screen;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductsScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'tovars' => Product::paginate(25)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Список продуктов';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Добавить товар')->route('platform.products.create')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            ProductListTable::class
        ];
    }

    public function deleteProduct(Request $request) {

        Product::find($request->input('id'))->delete();
        Toast::info("Продукт удален");
    }
}
