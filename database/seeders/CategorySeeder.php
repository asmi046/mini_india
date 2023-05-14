<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use DB;

class CategorySeeder extends Seeder
{

    protected function add_to_base($item, $parent) {

        $img = Storage::url("zdorovie.jpg");
        if ($item === "Здоровье") $img = Storage::url("zdorovie.jpg");
        if ($item === "Красота") $img = Storage::url("krasota.jpg");
        if ($item === "Гигиена") $img = Storage::url("gigiena.jpg");

        if ($item === "Ароматерапия") $img = Storage::url("aromaterapiya.jpg");
        if ($item === "Продукты питания") $img = Storage::url("produkty_pitaniya.jpg");
        if ($item === "Парфюмерия") $img = Storage::url("parfyumeriya.jpg");
        if ($item === "Уход за телом") $img = Storage::url("uhod_za_telom.jpg");
        if ($item === "Бад") $img = Storage::url("bad.jpg");
        if ($item === "Уход за полостью рта") $img = Storage::url("ukhod_za polostyu_rta.jpg");
        if ($item === "Травяные сигареты") $img = Storage::url("travyanyye_sigarety.jpg");
        if ($item === "Благовония") $img = Storage::url("blagovoniya.jpg");
        if ($item === "Чай") $img = Storage::url("chay.jpg");
        if ($item === "Сироп") $img = Storage::url("sirop.jpg");
        if ($item === "Уход за глазами") $img = Storage::url("ukhod_za_glazami.jpg");
        if ($item === "Уход за лицом") $img = Storage::url("ukhod_za_litsom.jpg");
        if ($item === "Духи") $img = Storage::url("duhy.jpg");
        if ($item === "Парфюмерные масла") $img = Storage::url("parfyumernyye_masla.jpg");
        if ($item === "Сок") $img = Storage::url("sok.jpg");
        if ($item === "Уход за носом") $img = Storage::url("ukhod_za_nosom.jpg");
        if ($item === "Масло") $img = Storage::url("maslo.jpg");
        if ($item === "РИС") $img = Storage::url("ris.jpg");
        if ($item === "Приправа") $img = Storage::url("priprava.jpg");
        if ($item === "Уход за губами") $img = Storage::url("ukhod_za_gubami.jpg");
        if ($item === "Мехеди для рук") $img = Storage::url("mekhedi_dlya_ruk.jpg");
        if ($item === "Уход за волосами") $img = Storage::url("ukhod_za_volosami.jpg");
        if ($item === "Конфеты") $img = Storage::url("konfety.jpg");
        if ($item === "Уход за кожей") $img = Storage::url("ukhod_za_kozhey.jpg");
        if ($item === "Уход вокруг глаз") $img = Storage::url("ukhod_vokrug_glaz.jpg");

        $category = DB::table('categories')->select('title')->where("title", $item)->first();

        if (empty($category))
        DB::table("categories")->insert(
            [
                "parent" => $parent,
                "img" => $img,
                "slug" => Str::slug($item),
                "title" => $item,
                "description" => 'Описание категории - ' . $item
            ]
        );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->put("zdorovie.jpg", file_get_contents(public_path('img//faker_img//zdorovie.jpg')), 'public');
        Storage::disk('public')->put("gigiena.jpg", file_get_contents(public_path('img//faker_img//gigiena.jpg')), 'public');
        Storage::disk('public')->put("krasota.jpg", file_get_contents(public_path('img//faker_img//krasota.jpg')), 'public');
        Storage::disk('public')->put("aromaterapiya.jpg", file_get_contents(public_path('img//faker_img//aromaterapiya.jpg')), 'public');
        Storage::disk('public')->put("produkty_pitaniya.jpg", file_get_contents(public_path('img//faker_img//produkty_pitaniya.jpg')), 'public');
        Storage::disk('public')->put("parfyumeriya.jpg", file_get_contents(public_path('img//faker_img//parfyumeriya.jpg')), 'public');
        Storage::disk('public')->put("uhod_za_telom.jpg", file_get_contents(public_path('img//faker_img//uhod_za_telom.jpg')), 'public');
        Storage::disk('public')->put("bad.jpg", file_get_contents(public_path('img//faker_img//bad.jpg')), 'public');
        Storage::disk('public')->put("ukhod_za polostyu_rta.jpg", file_get_contents(public_path('img//faker_img//ukhod_za polostyu_rta.jpg')), 'public');
        Storage::disk('public')->put("travyanyye_sigarety.jpg", file_get_contents(public_path('img//faker_img//travyanyye_sigarety.jpg')), 'public');
        Storage::disk('public')->put("blagovoniya.jpg", file_get_contents(public_path('img//faker_img//blagovoniya.jpg')), 'public');
        Storage::disk('public')->put("chay.jpg", file_get_contents(public_path('img//faker_img//chay.jpg')), 'public');
        Storage::disk('public')->put("sirop.jpg", file_get_contents(public_path('img//faker_img//sirop.jpg')), 'public');
        Storage::disk('public')->put("ukhod_za_glazami.jpg", file_get_contents(public_path('img//faker_img//ukhod_za_glazami.jpg')), 'public');
        Storage::disk('public')->put("ukhod_za_litsom.jpg", file_get_contents(public_path('img//faker_img//ukhod_za_litsom.jpg')), 'public');
        Storage::disk('public')->put("duhy.jpg", file_get_contents(public_path('img//faker_img//duhy.jpg')), 'public');
        Storage::disk('public')->put("parfyumernyye_masla.jpg", file_get_contents(public_path('img//faker_img//parfyumernyye_masla.jpg')), 'public');
        Storage::disk('public')->put("sok.jpg", file_get_contents(public_path('img//faker_img//sok.jpg')), 'public');
        Storage::disk('public')->put("ukhod_za_nosom.jpg", file_get_contents(public_path('img//faker_img//ukhod_za_nosom.jpg')), 'public');
        Storage::disk('public')->put("maslo.jpg", file_get_contents(public_path('img//faker_img//maslo.jpg')), 'public');
        Storage::disk('public')->put("ris.jpg", file_get_contents(public_path('img//faker_img//ris.jpg')), 'public');
        Storage::disk('public')->put("priprava.jpg", file_get_contents(public_path('img//faker_img//priprava.jpg')), 'public');
        Storage::disk('public')->put("ukhod_za_gubami.jpg", file_get_contents(public_path('img//faker_img//ukhod_za_gubami.jpg')), 'public');
        Storage::disk('public')->put("mekhedi_dlya_ruk.jpg", file_get_contents(public_path('img//faker_img//mekhedi_dlya_ruk.jpg')), 'public');
        Storage::disk('public')->put("ukhod_za_volosami.jpg", file_get_contents(public_path('img//faker_img//ukhod_za_volosami.jpg')), 'public');
        Storage::disk('public')->put("konfety.jpg", file_get_contents(public_path('img//faker_img//konfety.jpg')), 'public');
        Storage::disk('public')->put("ukhod_za_kozhey.jpg", file_get_contents(public_path('img//faker_img//ukhod_za_kozhey.jpg')), 'public');
        Storage::disk('public')->put("ukhod_vokrug_glaz.jpg", file_get_contents(public_path('img//faker_img//ukhod_vokrug_glaz.jpg')), 'public');


        $all_cat = get_all_cat( base_path() . '/public/tovars/new_products_load_img_utf_8.csv' );

        // dd($all_cat);

        foreach($all_cat as $key => $value) {
            $this->add_to_base($key, "");
            echo "Добавлена категория: ".$key." \n\r";

            // foreach ($value as $item) {
            //     $this->add_to_base($item, $key);
            //     echo "Добавлена категория: ".$item." Родительская: ".$key."\n\r";
            // }
        }


    }
}
