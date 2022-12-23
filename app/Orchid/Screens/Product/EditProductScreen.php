<?php

namespace App\Orchid\Screens\Product;

use Orchid\Screen\Screen;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Switcher;

use Orchid\Support\Facades\Toast;

use Illuminate\Http\Request;

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

                Input::make('price')
                    ->title('Цена')
                    ->value($this->tovar->price)
                    ->help('Действующая цена')
                    ->horizontal(),

                Input::make('price')
                    ->title('Старая цена')
                    ->value($this->tovar->old_price)
                    ->help('Цена до скидки')
                    ->horizontal(),

                Relation::make('category')
                    ->fromModel(Category::class, 'title', 'title')
                    ->title('Категория товара')
                    ->value($this->tovar->category)
                    ->help('Выберите нужную категорию'),

                Relation::make('brand')
                    ->fromModel(Brand::class, 'title', 'title')
                    ->title('Бренд товара')
                    ->value($this->tovar->brand)
                    ->help('Выберите бренд'),

                Quill::make('description')->title('Описание')->value($this->tovar->description),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Основные поля'),

            Layout::rows([
                Switcher::make('hit')
                    ->value($this->tovar->hit)
                    ->sendTrueOrFalse()
                    ->title('Хит продаж (hit)')
                    ->placeholder('Пометка hit')
                    ->help('Пометка hit 2'),

                Switcher::make('new')
                    ->value($this->tovar->new)
                    ->sendTrueOrFalse()
                    ->title('Хит продаж (new)')
                    ->placeholder('Пометка new')
                    ->help('Пометка new 2'),

                Relation::make('category')
                    ->fromModel(Category::class, 'title', 'title')
                    ->title('Категория товара')
                    ->value($this->tovar->category)
                    ->help('Выберите нужную категорию'),

                Relation::make('brand')
                    ->fromModel(Brand::class, 'title', 'title')
                    ->title('Бренд товара')
                    ->value($this->tovar->brand)
                    ->help('Выберите бренд'),

                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Аттрибуты товара'),

            Layout::rows([
                Picture::make('img')->title('Загрузить основное изображение записи')->targetRelativeUrl()->value($this->tovar->img),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Изображения товара'),

            Layout::rows([
                Input::make('seo_title')
                    ->title('SEO заголовок')
                    ->value($this->tovar->seo_title)
                    ->help('SEO заголовок')
                    ->horizontal(),

                TextArea::make('seo_description')
                    ->title('SEO описание')
                    ->value($this->tovar->seo_description)
                    ->help('SEO описание')
                    ->horizontal(),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('SEO')
        ];
    }

    public function save_info(Product $tovar, Request $request) {
        $new_data = $request->validate([
            'sku' => ['required', 'string'],
            'title' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'description' => [],
            'img' => [],
            'price' => ['required', 'digits_between:1,12'],
            'old_price' => [ 'digits_between:1,12'],
            'hit' => [],
            'new' => [],
            'category' => ['required'],
            'brand' => ['required'],
            'seo_title' => [],
            'seo_description' => []
        ]);

        $n_product = Product::where('id', $tovar->id)->update($new_data);
        Toast::info("Товар сохранен");
    }

}
