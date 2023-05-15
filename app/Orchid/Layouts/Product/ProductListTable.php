<?php

namespace App\Orchid\Layouts\Product;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\Link;

use Orchid\Screen\Actions\DropDown;

use Orchid\Screen\Actions\Button;

use App\Models\Product;

class ProductListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tovars';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'id'),
            TD::make('sku', 'Артикул')->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата')->render(
                function($element) {
                    return date("d.m.Y H:i", strtotime($element->created_at));
                }
            )->sort(),
            TD::make('img', 'Логотип')->render(
                function($element) {
                    return "<img width='50' height='50' src='".($element->img?$element->img:asset("img/noPhoto.jpg"))."'>";
                }
            ),
            TD::make('title', 'Название')->width('50%')->sort()->filter(TD::FILTER_TEXT),
            TD::make('price', 'Цена')->render(
                function($element) {
                    return $element->price." ₽";
                }
            ),

            TD::make(__('Действие'))
            ->align(TD::ALIGN_CENTER)
            ->width('100px')
            ->render(fn (Product $product) => DropDown::make()
                ->icon('options-vertical')
                ->list([

                    Link::make('Редактировать')->route('platform.products.edit',$product->id)->icon('note'),

                    Button::make('Удалить')->method('deleteProduct')->parameters([
                        'id' => $product->id,
                    ])->icon('trash')
                ])),

            // TD::make('action', 'Действие')->render(function($element) {
            //     return  Group::make([
            //         Link::make('Редактировать')->route('platform.products.edit',$element->id)
            //     ]);
            // })
        ];
    }
}
