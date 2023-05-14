<?php

namespace App\Orchid\Layouts\Category;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Color;
use Orchid\Screen\Actions\Button;

use App\Models\Category;

use Orchid\Screen\Actions\DropDown;

class CategoriesListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'id')->width('10%'),
            TD::make('img', 'Логотип')->width('15%')->render(
                function($element) {

                    return "<img width='50' height='50' src='".($element->img?$element->img:asset("img/noPhoto.jpg"))."'>";
                }
            ),
            TD::make('title', 'Название')->sort()->filter(TD::FILTER_TEXT),
            TD::make('description', 'Описание'),

            TD::make(__('Действие'))
            ->align(TD::ALIGN_CENTER)
            ->width('100px')
            ->render(fn (Category $category) => DropDown::make()
                ->icon('options-vertical')
                ->list([

                    ModalToggle::make('Редактировать')
                    ->modal('editCategoryModal')
                    ->method('editCategory')
                    ->modalTitle('Редактировать категорию '.$category->title)
                    ->asyncParameters([
                        'category' => $category->id
                    ])->icon('note'),

                    Button::make('Удалить')->method('deleteCategory')->parameters([
                        'id' => $category->id,
                        'img' => $category->img,
                    ])->icon('trash')
                ])),

        ];
    }
}
