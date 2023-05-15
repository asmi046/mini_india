<?php

namespace App\Orchid\Layouts\Order;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\Link;

use Orchid\Screen\Actions\DropDown;

use Orchid\Screen\Actions\Button;

use App\Models\Product;

class OrderProductListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orderProducts';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('tovar_data.sku', 'Артикул'),

            TD::make('tovar_data.img', 'Фото')->render(
                function($element) {
                    return "<img width='50' height='50' src='".($element->tovar_data->img?$element->tovar_data->img:asset("img/noPhoto.jpg"))."'>";
                }
            ),
            TD::make('tovar_data.title', 'Название')->width('50%'),
            TD::make('quentity', 'Количество'),
            TD::make('price', 'Цена')->render(
                function($element) {
                    return $element->price." ₽";
                }
            ),
            TD::make('summ', 'Сумма')->render(
                function($element) {
                    return round($element->price * $element->quentity, 2)." ₽";
                }
            ),
        ];
    }
}
