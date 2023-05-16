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
use App\Models\Option;

use Orchid\Screen\Field;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;

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
            ],

            // 'options' => Option::all()
            'options' => [
                'tov_zdr' => Option::where('name','tov_zdr')->first(),
                'uh_lik' => Option::where('name','uh_lik')->first(),
                'uh_vl' => Option::where('name','uh_vl')->first(),

                'phone' => Option::where('name','phone')->first(),
                'email' => Option::where('name','email')->first(),
                'tg' => Option::where('name','telegram_lnk')->first(),
                'ws' => Option::where('name','whatsapp_lnk')->first(),
                'email_send' => Option::where('name','email_send')->first()
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
                    Input::make('opt.tg')
                    ->title('Ссылка на telegram')
                    ->value(Arr::get($this->query(),'options.tg.value'))
                    ->help('Введите ссылку на telegram')
                    ->horizontal(),

                    Input::make('opt.ws')
                    ->title('Ссылка на whatsapp')
                    ->value(Arr::get($this->query(),'options.ws.value'))
                    ->help('Введите ссылку на whatsapp')
                    ->horizontal(),

                    Input::make('opt.phone')
                    ->title('Телефон')
                    ->value(Arr::get($this->query(),'options.phone.value'))
                    ->help('Введите телефон для отображения на сайте')
                    ->horizontal(),

                    Input::make('opt.email')
                    ->title('E-mail')
                    ->value(Arr::get($this->query(),'options.email.value'))
                    ->help('Введите e-mail для отображения на сайте')
                    ->horizontal(),

                    Input::make('opt.email_send')
                    ->title('E-mail для отправки')
                    ->value(Arr::get($this->query(),'options.email_send.value'))
                    ->help('Введите e-mail для отправки уведомлений')
                    ->horizontal(),

                    Input::make('opt.tov_zdr')
                    ->title('Ссылка на товары для здоровья')
                    ->value(Arr::get($this->query(),'options.tov_zdr.value'))
                    ->help('Ссылка на товары для здоровья')
                    ->horizontal(),

                    Input::make('opt.uh_lik')
                    ->title('Ссылка на уход за лицом')
                    ->value(Arr::get($this->query(),'options.uh_lik.value'))
                    ->help('Ссылка на уход за лицом')
                    ->horizontal(),

                    Input::make('opt.uh_vl')
                    ->title('Ссылка на уход за волосами')
                    ->value(Arr::get($this->query(),'options.uh_vl.value'))
                    ->help('Ссылка на уход за волосами')
                    ->horizontal(),

                    Button::make('Сохранить')
                        ->method('save_options')

                ])->title('Основные настройки'),
            ])
        ];
    }

    public function save_options(Request $request) {
        Option::where('name', 'tov_zdr')->update(['value' => $request->input('opt.tov_zdr')]);
        Option::where('name', 'uh_lik')->update(['value' => $request->input('opt.uh_lik')]);
        Option::where('name', 'uh_vl')->update(['value' => $request->input('opt.uh_vl')]);

        Option::where('name', 'telegram_lnk')->update(['value' => $request->input('opt.tg')]);
        Option::where('name', 'whatsapp_lnk')->update(['value' => $request->input('opt.ws')]);

        Option::where('name', 'phone')->update(['value' => $request->input('opt.phone')]);
        Option::where('name', 'email')->update(['value' => $request->input('opt.email')]);
        Option::where('name', 'email_send')->update(['value' => $request->input('opt.email_send')]);
        Toast::info("Основные настройки сохранены");
    }
}
