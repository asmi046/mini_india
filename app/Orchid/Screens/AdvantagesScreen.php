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
    public $adv_lnk1;

    public $adv_title2;
    public $adv_text2;
    public $adv_lnk2;

    public $adv_title3;
    public $adv_text3;
    public $adv_lnk3;

    public function query(): iterable
    {
        return [
            'adv_title1' => Option::where('name', 'preim1_title')->first(),
            'adv_text1' => Option::where('name', 'preim1_text')->first(),
            'adv_lnk1' => Option::where('name', 'preim1_lnk')->first(),

            'adv_title2' => Option::where('name', 'preim2_title')->first(),
            'adv_text2' => Option::where('name', 'preim2_text')->first(),
            'adv_lnk2' => Option::where('name', 'preim2_lnk')->first(),

            'adv_title3' => Option::where('name', 'preim3_title')->first(),
            'adv_text3' => Option::where('name', 'preim3_text')->first(),
            'adv_lnk3' => Option::where('name', 'preim3_lnk')->first(),
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
            ->required()
            ->horizontal(),

            Input::make('lnk1')
            ->title('Ссылка преимущества #1')
            ->value($this->adv_lnk1->value)
            ->required()
            ->horizontal(),

            Quill::make('text1')->title('Текст преимущества #1')->required()->value($this->adv_text1->value),


            Input::make('title2')
            ->title('Заголовок преимущества #2')
            ->value($this->adv_title2->value)
            ->required()
            ->horizontal(),


                Input::make('lnk2')
                ->title('Ссылка преимущества #2')
                ->value($this->adv_lnk2->value)
                ->required()
                ->horizontal(),

            Quill::make('text2')->title('Текст преимущества #2')->required()->value($this->adv_text2->value),

            Input::make('title3')
            ->title('Заголовок преимущества #3')
            ->value($this->adv_title3->value)
            ->required()
            ->horizontal(),


                Input::make('lnk3')
                ->title('Ссылка преимущества #3')
                ->value($this->adv_lnk3->value)
                ->required()
                ->horizontal(),

            Quill::make('text3')->title('Текст преимущества #3')->required()->value($this->adv_text3->value),

            Button::make('Сохранить')->method('save_i')->type(Color::SUCCESS())
            ])
        ];
    }

    public function save_i(Request $request) {
        $new_data = $request->validate([
            'title1' => ['required', 'string'],
            'text1' => ['required', 'string'],
            'lnk1' => ['required', 'string'],

            'title2' => ['required', 'string'],
            'text2' => ['required', 'string'],
            'lnk2' => ['required', 'string'],

            'title3' => ['required', 'string'],
            'text3' => ['required', 'string'],
            'lnk3' => ['required', 'string'],
        ]);


        Option::where('name', 'preim1_title')->update(["value" => $new_data['title1']]);
        Option::where('name', 'preim1_text')->update(["value" => $new_data['text1']]);
        Option::where('name', 'preim1_lnk')->update(["value" => $new_data['lnk1']]);

        Option::where('name', 'preim2_title')->update(["value" => $new_data['title2']]);
        Option::where('name', 'preim2_text')->update(["value" => $new_data['text2']]);
        Option::where('name', 'preim2_lnk')->update(["value" => $new_data['lnk2']]);

        Option::where('name', 'preim3_title')->update(["value" => $new_data['title3']]);
        Option::where('name', 'preim3_text')->update(["value" => $new_data['text3']]);
        Option::where('name', 'preim3_lnk')->update(["value" => $new_data['lnk3']]);

        Toast::info("Данные сохранены");

    }
}
