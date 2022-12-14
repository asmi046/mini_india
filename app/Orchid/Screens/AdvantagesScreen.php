<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

use App\Models\Option;

use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Quill;

use Orchid\Support\Color;

use Orchid\Support\Facades\Toast;

use Illuminate\Http\Request;

class AdvantagesScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public $adv_title1;
    public $adv_text1;

    public $adv_title2;
    public $adv_text2;

    public $adv_title3;
    public $adv_text3;

    public function query(): iterable
    {
        return [
            'adv_title1' => Option::where('name', 'preim1_title')->first(),
            'adv_text1' => Option::where('name', 'preim1_text')->first(),

            'adv_title2' => Option::where('name', 'preim2_title')->first(),
            'adv_text2' => Option::where('name', 'preim2_text')->first(),

            'adv_title3' => Option::where('name', 'preim3_title')->first(),
            'adv_text3' => Option::where('name', 'preim3_text')->first(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Преимущества';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */


    public function commandBar(): iterable
    {
        return [
            Button::make('Сохранить')->method('save_i')->type(Color::SUCCESS())
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
            Layout::rows([
            Input::make('title1')
            ->title('Заголовок преимущества #1')
            ->value($this->adv_title1->value)
            ->horizontal(),

            Quill::make('text1')->title('Текст преимущества #1')->value($this->adv_text1->value),


            Input::make('title2')
            ->title('Заголовок преимущества #2')
            ->value($this->adv_title2->value)
            ->horizontal(),

            Quill::make('text2')->title('Текст преимущества #2')->value($this->adv_text2->value),

            Input::make('title3')
            ->title('Заголовок преимущества #3')
            ->value($this->adv_title3->value)
            ->horizontal(),

            Quill::make('text3')->title('Текст преимущества #3')->value($this->adv_text3->value),

            Button::make('Сохранить')->method('save_i')->type(Color::SUCCESS())
            ])
        ];
    }
}
