<?php

namespace App\Orchid\Screens\Product;

use Orchid\Screen\Screen;

use App\Models\Product;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;

class EditProductScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public $tovar;

    public function query($id): iterable
    {
        return [
            'tovar' => Product::where('id', $id)->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование продукта: '.$this->tovar->title;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('title')
                    ->title('Название')
                    ->value($this->tovar->title)
                    ->help('Наименование товара')
                    ->horizontal(),

                Input::make('slug')
                    ->title('Ссылка')
                    ->value($this->tovar->slug)
                    ->help('Ококнчание ссылки')
                    ->horizontal(),

                Input::make('sku')
                    ->title('Артикул')
                    ->value($this->tovar->sku)
                    ->help('SKU товара')
                    ->horizontal(),

            Quill::make('description')->title('Описание')->value($this->tovar->description)

            ])->title('Основные поля'),

            Layout::rows([
                Input::make('seo_title')
                    ->title('SEO заголовок')
                    ->value($this->tovar->title)
                    ->help('SEO заголовок')
                    ->horizontal(),

                Input::make('seo_description')
                    ->title('SEO описание')
                    ->value($this->tovar->slug)
                    ->help('SEO описание')
                    ->horizontal(),

            ])->title('SEO')
        ];
    }
}
