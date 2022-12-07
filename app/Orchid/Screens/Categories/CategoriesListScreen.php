<?php

namespace App\Orchid\Screens\Categories;

use Orchid\Screen\Screen;

use App\Models\Category;

use App\Orchid\Layouts\Category\CategoriesListTable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Support\Facades\Toast;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CategoriesListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categories' => Category::paginate(15)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Категории товаров';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Добавить категорию')->modal('addCategoryModal')->method('newCategory')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::modal('addCategoryModal',
                Layout::rows([
                    Input::make("title")->required()->title('Название категории'),
                    Input::make("slug")->required()->title('Псевданим'),
                    TextArea::make("description")->required()->title('Описание категории'),
                    Picture::make('img')->title('Загрузить изображение')->targetRelativeUrl(),
                ])
            )->title("Создать новую категорию"),

            Layout::modal('editCategoryModal',
                Layout::rows([
                    Input::make("category.id")->type('hidden'),
                    Input::make("category.title")->required()->title('Название категории'),
                    Input::make("category.slug")->required()->title('Псевданим'),
                    TextArea::make("category.description")->required()->title('Описание категории'),
                    Picture::make('category.img')->title('Загрузить изображение')->targetRelativeUrl(),
                ])
            )->async('asyncGetСategory'),

            CategoriesListTable::class
        ];
    }

    public function asyncGetСategory(Category $category) {
        return [
            'category' => $category
        ];
    }

    public function newCategory(Request $request) {
        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'description' => ['required', 'min:5'],
            'img' => ['required'],
        ]);


        $review = Category::create($request->all());

        $attach = Attachment::where('name',  pathinfo($request->input('img'))['filename'])->first();
        if ($attach) $attach->delete();

        Toast::info("Бренд добавлен");
    }

    public function editCategory(Request $request) {
        // dd($request->brand);
        Category::find($request->input('category.id'))->update($request->category);
        Toast::info("Категория добавлена");
    }

    public function deleteCategory(Request $request) {
        Storage::delete($request->input('img'));
        Category::find($request->input('id'))->delete();
        Toast::info("Категория удалена");
    }
}
