<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

use App\Models\Option;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Quill;

use Orchid\Support\Color;

use Orchid\Support\Facades\Toast;

use Illuminate\Http\Request;

class TextEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $option;

    public function query($id): iterable
    {
        return [
            "option" => Option::where('name', $id)->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование: '.$this->option->title;
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
                Quill::make('value')->title('Содержание страницы')->value($this->option->value),
                Button::make('Сохранить')->method('save_i')->type(Color::SUCCESS())
            ])
        ];
    }

    public function save_i($option, Request $request) {


        $this_option = Option::where('name', $option)->first();
        $this_option->value = $request->get('value');
        $this_option->save();
        Toast::info("Товар сохранен");
    }
}
