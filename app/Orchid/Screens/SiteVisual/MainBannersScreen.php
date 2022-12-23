<?php

namespace App\Orchid\Screens\SiteVisual;

use Orchid\Screen\Screen;

use App\Models\Banner;

use App\Orchid\Layouts\MainBanners\MainBannersTable;

use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;

use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;

use Orchid\Support\Facades\Toast;
use Orchid\Attachment\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class MainBannersScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'banners' => Banner::all()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Баннеры на главной странице';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Новый баннер')->modal('addBannerModal')->method('newBanner')
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
            Layout::modal('addBannerModal',
                Layout::rows([
                    Input::make("title")->required()->title('Заголовок баннера'),
                    Picture::make('img')->title('Загрузить баннер')->targetRelativeUrl(),
                ])
            )->title("Создать новый баннер"),

            Layout::modal('editBannerModal',
                Layout::rows([
                    Input::make("banner.id")->type('hidden'),
                    Input::make("banner.title")->required()->title('Заголовок баннера'),
                    Picture::make('banner.img')->title('Загрузить баннер')->targetRelativeUrl(),
                ])
            )->async('asyncGetBanner'),

            MainBannersTable::class,
        ];
    }

    public function asyncGetBanner(Banner $banner) {
        return [
            'banner' => $banner
        ];
    }

    public function newBanner(Request $request) {
        $request->validate([
            'title' => ['required'],
            'img' => ['required'],
        ]);


        $review = Banner::create($request->all());

        $attach = Attachment::where('name',  pathinfo($request->input('img'))['filename'])->first();
        if ($attach) $attach->delete();

        Toast::info("Баннер добавлен");
    }

    public function editBanner(Request $request) {
        // dd($request->brand);
        Banner::find($request->input('banner.id'))->update($request->banner);
        Toast::info("Баннер обновлен");
    }

    public function deleteBanner(Request $request) {
        Storage::delete($request->input('img'));
        Banner::find($request->input('id'))->delete($request->input('id'));
        Toast::info("Баннер удален");
    }
}
