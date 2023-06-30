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

class EditProductScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public $tovar;
    public $tovar_category;
    public $product_img;

    public function query($id): iterable
    {
        $t = Product::where('id', $id)->first();
        return [
            'tovar' => $t,
            'tovar_category' => $t->tovar_category,
            'product_img' => $t->product_images
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

            Layout::modal('ImgLoadModal', [
                Layout::rows([
                    Picture::make('link')->title('Загрузить изображение')->targetRelativeUrl(),

                    Input::make('alt')
                        ->title('alt изображения'),

                    Input::make('title')
                        ->title('title изображения')
                ]),
            ]),

            Layout::rows([
                Input::make('title')
                    ->title('Название')
                    ->value($this->tovar->title)
                    ->required()
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
                    ->required()
                    ->horizontal(),

                Input::make('price')
                    ->title('Цена')
                    ->value($this->tovar->price)
                    ->help('Действующая цена')
                    ->required()
                    ->horizontal(),

                Input::make('old_price')
                    ->title('Старая цена')
                    ->value($this->tovar->old_price)
                    ->help('Цена до скидки')
                    ->horizontal(),

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

                Switcher::make('recommend')
                    ->value($this->tovar->recommend)
                    ->sendTrueOrFalse()
                    ->title('Рекомендуемый товар')
                    ->placeholder('Рекомендуемый товар')
                    ->help('Вывод в разделе рекомендуемые'),

                Relation::make('category.')
                    ->fromModel(Category::class, 'title', 'id')
                    ->title('Категория товара')
                    ->value($this->tovar_category)
                    ->multiple()
                    ->required()
                    ->chunk(1000)
                    ->help('Выберите нужную категорию'),

                Input::make('sub_category')
                    ->title('Подкатегория')
                    ->value($this->tovar->sub_category)
                    ->help('Подкатегория для фильтра'),

                Relation::make('brand')
                    ->fromModel(Brand::class, 'title', 'title')
                    ->title('Бренд товара')
                    ->value($this->tovar->brand)
                    ->required()
                    ->chunk(1000)
                    ->help('Выберите бренд'),

                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Аттрибуты товара'),

            Layout::rows([
                Picture::make('img')->title('Загрузить основное изображение записи')->targetRelativeUrl()->value($this->tovar->img),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Изображения товара'),

            ProductImageTable::class,

            Layout::rows([

                ModalToggle::make('Добавить изображение')
                ->modal('ImgLoadModal')
                ->method('load_image')
                ->icon('picture')
                ->modalTitle('Добавить изображение'),

            ])->title('Управление изображениями товара'),

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
            'sku' => ['required', 'string', Rule::unique('products')->ignore($tovar->id)],
            'title' => ['required', 'string'],
            'slug' => [],
            'description' => [],
            'img' => [],
            'price' => ['required', 'digits_between:1,12'],
            'old_price' => [ 'digits_between:1,12'],
            'hit' => [],
            'new' => [],
            'recommend' => [],
            'category' => ['required'],
            'sub_category' => [],
            'brand' => ['required'],
            'seo_title' => [],
            'seo_description' => []
        ]);

        $tovar->tovar_category()->sync($request->get("category"));

        $n_product = Product::where('id', $tovar->id)->update($new_data);
        Toast::info("Товар сохранен");
    }

    public function load_image(Product $product, Request $request) {

        $new_data = $request->validate([
            'link' => ['required', 'string'],
            'alt' => [],
            'title' => [],
        ]);


        $product->product_images()->create($new_data);

        Toast::info("Изображение добавлено");
    }

    public function delete_image(Request $request) {
        $dell_elem = ProductImage::where('id', $request->input("id"))->first();

        if ($dell_elem ) {
            $dell_elem->delete();
            Toast::info("Изображение удалено");
            // Alert::info("Изображение удалено");
        } else {
            Toast::info("Ошибка при удалении");
        }
    }

}
