<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Fields\Group;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

use Orchid\Screen\Fields\Input;

class PlatformScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'metrics' => [
                'brands'    => ['value' => Brand::all()->count()],
                'tovars' => ['value' => Product::all()->count()],
                'categorys'   => ['value' => Category::all()->count()],
            ]
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Администрирование - Mini-India';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Добро пожаловать в административную панель - Mini-India.';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Перейти на сайт')
                ->href(route('home'))
                ->icon('globe')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::metrics([
                'Брендов'    => 'metrics.brands',
                'Товаров' => 'metrics.tovars',
                'Категорий' => 'metrics.categorys',
            ]),

            Layout::columns([
                Layout::rows([
                    Link::make('Редактировать бренды')
                    ->href(route('platform.brand'))
                    ->icon('copyright'),
                    Link::make('Редактировать категории')
                    ->href(route('platform.categories'))
                    ->icon('book-open')
                ])->title('Редактирование'),

                Layout::rows([
                    Input::make('phone')
                    ->title('Телефон')
                    ->value('8 800 000 00 00')
                    ->help('Введите телефон для отображения на сайте')
                    ->horizontal(),

                    Input::make('email')
                    ->title('E-mail')
                    ->value('example@mini-india.ru')
                    ->help('Введите e-mail для отображения на сайте')
                    ->horizontal(),

                    Input::make('email_send')
                    ->title('E-mail для отправки')
                    ->value('example@mini-india.ru')
                    ->help('Введите e-mail для отправки уведомлений')
                    ->horizontal(),
                ])->title('Основные настройки'),
            ])
        ];
    }
}
