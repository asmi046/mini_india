<?php

namespace App\Orchid\Layouts\MainBanners;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use Orchid\Support\Color;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;

use App\Models\Banner;

class MainBannersTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'banners';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'id')->width('10%'),
            TD::make('img', 'Баннер')->width('15%')->render(
                function($element) {

                    return "<img width='50' height='50' src='".($element->img?$element->img:asset("img/noPhoto.jpg"))."'>";
                }
            ),
            TD::make('title', 'Описание'),
            TD::make('action', 'Действие')->render(function(Banner $banner) {
                return  Group::make([
                    ModalToggle::make('Редактировать')
                    ->modal('editBannerModal')
                    ->method('editBanner')
                    ->modalTitle('Редактировать баннер '.$banner->title)
                    ->asyncParameters([
                        'banner' => $banner->id
                    ])->type(Color::PRIMARY())->icon('note'),

                    Button::make('Удалить')->method('deleteBrand')->parameters([
                        'id' => $banner->id,
                        'img' => $banner->img,
                    ])->type(Color::DANGER())->icon('trash')
                ]);
            })
        ];
    }
}
