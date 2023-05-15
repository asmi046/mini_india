<?php

namespace App\Orchid\Screens\Order;

use Orchid\Screen\Screen;

use App\Models\Order;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\TextArea;

use App\Orchid\Layouts\Order\OrderProductListTable;

class OrderEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

     public $order;
     public $orderProducts;

    public function query($id): iterable
    {
        $order = Order::where('id', $id)->first();
        $op = $order->orderCart()->with('tovar_data')->get();

        // dd($op);

        return [
            'order' => $order,
            'orderProducts' => $op
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование заказа #'.$this->order->id;
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

            Layout::rows([
                Input::make('id')
                ->title('№ заказа')
                ->value($this->order->id)
                ->help('№ заказа в базе')
                ->horizontal(),

                DateTimer::make('created_at')
                ->title('Время')
                ->value($this->order->created_at)
                ->help('Время оформления заказчика')
                ->horizontal(),

                Input::make('amount')
                ->title('Сумма (₽)')
                ->value($this->order->amount)
                ->help('Сумма заказа (₽)')
                ->horizontal(),

                Input::make('name')
                ->title('Заказчик')
                ->value($this->order->name)
                ->help('Имя заказчика')
                ->horizontal(),

                Input::make('email')
                ->title('Почта')
                ->value($this->order->email)
                ->help('Почта заказчика')
                ->horizontal(),

                Input::make('phone')
                ->title('Телефон')
                ->value($this->order->phone)
                ->help('Телефон заказчика')
                ->horizontal(),

                TextArea::make('adress')
                ->title('Адрес')
                ->value($this->order->adress)
                ->help('Адрес заказчика')
                ->horizontal(),

                TextArea::make('comment')
                ->title('Комментарий')
                ->value($this->order->comment)
                ->help('Комментарий заказчика')
                ->horizontal(),
            ]),

            OrderProductListTable::class
        ];
    }
}
