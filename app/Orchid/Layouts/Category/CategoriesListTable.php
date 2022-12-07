<?php

namespace App\Orchid\Layouts\Category;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Color;
use Orchid\Screen\Actions\Button;

use App\Models\Category;

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
            TD::make('title', 'Название'),
            TD::make('description', 'Описание'),
            TD::make('action', 'Действие')->render(function(Category $category) {
                return  Group::make([
                    ModalToggle::make('Редактировать')
                    ->modal('editCategoryModal')
                    ->method('editCategory')
                    ->modalTitle('Редактировать категорию '.$category->title)
                    ->asyncParameters([
                        'category' => $category->id
                    ])->type(Color::PRIMARY())->icon('note'),

                    Button::make('Удалить')->method('deleteCategory')->parameters([
                        'id' => $category->id,
                        'img' => $category->img,
                    ])->type(Color::DANGER())->icon('trash')
                ]);
            })
        ];
    }
}
