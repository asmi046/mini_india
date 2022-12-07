<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Fields\Group;

use App\Models\Brand;

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
                'tovars' => ['value' => number_format(24668), 'diff' => -30.76],
                'categorys'   => ['value' => number_format(10000), 'diff' => 0],
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
                ->href(route('platform.brand'))
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
                    ->href(route('home'))
                    ->icon('copyright')
                ])->title('Редактирование'),

                Layout::rows([
                    Link::make('Редактировать бренды')
                    ->href(route('home'))
                    ->icon('copyright')
                ])->title('Основные настройки'),
            ])
        ];
    }
}
