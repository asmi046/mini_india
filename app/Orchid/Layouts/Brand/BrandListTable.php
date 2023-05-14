<?php

namespace App\Orchid\Layouts\Brand;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use Orchid\Support\Color;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;

use Orchid\Screen\Actions\DropDown;

use App\Models\Brand;



class BrandListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'brands';

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
            ->render(fn (Brand $brand) => DropDown::make()
                ->icon('options-vertical')
                ->list([

                    ModalToggle::make('Редактировать')
                    ->modal('editBrandModal')
                    ->method('editBrand')
                    ->modalTitle('Редактировать бренд '.$brand->title)
                    ->asyncParameters([
                        'brand' => $brand->id
                    ])->icon('note'),

                    Button::make('Удалить')->method('deleteBrand')->parameters([
                        'id' => $brand->id,
                        'img' => $brand->img,
                    ])->icon('trash')
                ])),


            // TD::make('action', 'Действие')->render(function(Brand $brand) {
            //     return  Group::make([
            //         ModalToggle::make('Редактировать')
            //         ->modal('editBrandModal')
            //         ->method('editBrand')
            //         ->modalTitle('Редактировать бренд '.$brand->title)
            //         ->asyncParameters([
            //             'brand' => $brand->id
            //         ])->type(Color::PRIMARY())->icon('note'),

            //         Button::make('Удалить')->method('deleteBrand')->parameters([
            //             'id' => $brand->id,
            //             'img' => $brand->img,
            //         ])->type(Color::DANGER())->icon('trash')
            //     ]);
            // })
        ];
    }
}
