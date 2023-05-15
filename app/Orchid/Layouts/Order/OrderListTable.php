<?php

namespace App\Orchid\Layouts\Order;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\Link;

use Orchid\Screen\Actions\DropDown;

use Orchid\Screen\Actions\Button;

use App\Models\Order;

class OrderListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'id')->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата')->render(
                function($element) {
                    return date("d.m.Y H:i", strtotime($element->created_at));
                }
            )->sort(),

            TD::make('name', 'Заказчик')->sort()->filter(TD::FILTER_TEXT),
            TD::make('email', 'e-mail')->sort()->filter(TD::FILTER_TEXT),
            TD::make('phone', 'Телефон')->sort()->filter(TD::FILTER_TEXT),
            TD::make('amount', 'Сумма')->render(
                function($element) {
                    return $element->amount." ₽";
                }
            ),


            TD::make(__('Действие'))
            ->align(TD::ALIGN_CENTER)
            ->width('100px')
            ->render(fn (Order $order) => DropDown::make()
                ->icon('options-vertical')
                ->list([

                    Link::make('Подробнее')->route('platform.orders.edit',$order->id)->icon('magnifier-add'),
                    // Link::make('Редактировать'),

                ])),
        ];
    }
}
