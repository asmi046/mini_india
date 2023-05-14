<?php

namespace App\Orchid\Screens\Product;

use Orchid\Screen\Screen;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductImage;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Actions\ModalToggle;

use Illuminate\Validation\Rule;

use Orchid\Support\Facades\Toast;

use Illuminate\Http\Request;

use App\Orchid\Layouts\Product\ProductImageTable;

class CreateProductScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public function query($id): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Создание нового продукта: ';
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
                    ->require()
                    ->help('Наименование товара')
                    ->horizontal(),

                Input::make('slug')
                    ->title('Ссылка')
                    ->help('Ококнчание ссылки')
                    ->horizontal(),

                Input::make('sku')
                    ->title('Артикул')
                    ->help('SKU товара')
                    ->require()
                    ->horizontal(),

                Input::make('price')
                    ->title('Цена')
                    ->help('Действующая цена')
                    ->require()
                    ->horizontal(),

                Input::make('old_price')
                    ->title('Старая цена')
                    ->help('Цена до скидки')
                    ->horizontal(),

                Quill::make('description')->title('Описание'),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Основные поля'),

            Layout::rows([
                Switcher::make('hit')
                    ->sendTrueOrFalse()
                    ->title('Хит продаж (hit)')
                    ->placeholder('Пометка hit')
                    ->help('Пометка hit 2'),

                Switcher::make('new')
                    ->sendTrueOrFalse()
                    ->title('Хит продаж (new)')
                    ->placeholder('Пометка new')
                    ->help('Пометка new 2'),

                Relation::make('category.')
                    ->fromModel(Category::class, 'title', 'id')
                    ->title('Категория товара')
                    ->multiple()
                    ->require()
                    ->chunk(1000)
                    ->help('Выберите нужную категорию'),

                Input::make('sub_category')
                    ->title('Подкатегория')
                    ->help('Подкатегория для фильтра'),

                Relation::make('brand')
                    ->fromModel(Brand::class, 'title', 'title')
                    ->title('Бренд товара')
                    ->require()
                    ->chunk(1000)
                    ->help('Выберите бренд'),

                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Аттрибуты товара'),

            Layout::rows([
                Picture::make('img')->title('Загрузить основное изображение записи')->targetRelativeUrl(),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Изображения товара'),

            Layout::rows([
                Input::make('seo_title')
                    ->title('SEO заголовок')
                    ->help('SEO заголовок')
                    ->horizontal(),

                TextArea::make('seo_description')
                    ->title('SEO описание')

                    ->help('SEO описание')
                    ->horizontal(),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('SEO')
        ];
    }

    public function save_info(Request $request) {
        $new_data = $request->validate([
            'sku' => ['required', 'string', Rule::unique('products')->ignore(Product::class)],
            'title' => ['required', 'string'],
            'slug' => [],
            'description' => [],
            'img' => [],
            'price' => ['required', 'digits_between:1,12'],
            'old_price' => [ 'digits_between:1,12'],
            'hit' => [],
            'new' => [],
            'sub_category' => [],
            'brand' => ['required'],
            'seo_title' => [],
            'seo_description' => []
        ]);

        $new_tovar = Product::create($new_data);

        $new_tovar->tovar_category()->sync($request->get("category"));

        Toast::info("Товар сохранен");

        return redirect()->route('platform.products');
    }

}
