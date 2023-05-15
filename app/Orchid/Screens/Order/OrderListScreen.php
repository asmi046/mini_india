<?php

namespace App\Orchid\Screens\Order;

use Orchid\Screen\Screen;

use App\Orchid\Layouts\Order\OrderListTable;

use App\Models\Order;

class OrderListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

     public $orders;
    public function query(): iterable
    {
        return [
            'orders' => Order::filters()->defaultSort('created_at', 'desc')->paginate(25)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Список заказов';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            OrderListTable::class

        ];
    }
}
