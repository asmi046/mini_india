<?php

namespace App\Orchid\Screens\Brand;

use Orchid\Screen\Screen;

use App\Models\Brand;

use App\Orchid\Layouts\Brand\BrandListTable;

use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;

use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;

use Orchid\Support\Facades\Toast;

use Orchid\Attachment\Models\Attachment;


class BrandScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'brands' => Brand::paginate(15)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Бренды';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Новый бренд')->modal('addBrandModal')->method('newBrend')
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
            Layout::modal('addBrandModal',
                Layout::rows([
                    Input::make("title")->required()->title('Название бренда'),
                    Input::make("slug")->required()->title('Псевданим'),
                    TextArea::make("description")->required()->title('Описание бренда'),
                    Picture::make('img')->title('Загрузить логотип')->targetRelativeUrl(),
                ])
            )->title("Создать новый бренд"),

            Layout::modal('editBrandModal',
                Layout::rows([
                    Input::make("brand.id")->type('hidden'),
                    Input::make("brand.title")->required()->title('Название бренда'),
                    Input::make("brand.slug")->required()->title('Псевданим'),
                    TextArea::make("brand.description")->required()->title('Описание бренда'),
                    Picture::make('brand.img')->title('Загрузить логотип')->targetRelativeUrl(),
                ])
            )->async('asyncGetBrand'),

            BrandListTable::class,
        ];
    }


    public function asyncGetBrand(Brand $brand) {
        return [
            'brand' => $brand
        ];
    }

    public function newBrend(Request $request) {
        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'description' => ['required', 'min:5'],
            'img' => ['required'],
        ]);


        $review = Brand::create($request->all());

        $attach = Attachment::where('name',  pathinfo($request->input('img'))['filename'])->first();
        if ($attach) $attach->delete();

        Toast::info("Бренд добавлен");
    }

    public function editBrand(Request $request) {
        // dd($request->brand);
        Brand::find($request->input('brand.id'))->update($request->brand);
        Toast::info("Бренд обновлен");
    }

    public function deleteBrand(Request $request) {
        Storage::delete($request->input('img'));
        Brand::find($request->input('id'))->delete($request->input('id'));
        Toast::info("Бренд удален");
    }
}
