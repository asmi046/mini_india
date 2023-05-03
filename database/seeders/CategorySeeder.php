<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->put("zdorovie.jpg", file_get_contents(public_path('img//faker_img//zdorovie.jpg')), 'public');
        Storage::disk('public')->put("gigiena.jpg", file_get_contents(public_path('img//faker_img//gigiena.jpg')), 'public');
        Storage::disk('public')->put("aromo.jpg", file_get_contents(public_path('img//faker_img//aromo.jpg')), 'public');

        $all_cat1 = get_all_cat( base_path() . '/public/tovars/new_products_1.csv' );
        $all_cat2 = get_all_cat( base_path() . '/public/tovars/new_products_2.csv' );

        dd(array_merge($all_cat1, $all_cat2));
        return;

        foreach($all_cat as $item) {
            $img = "";
            if ($item === "Здоровье") $img = Storage::url("zdorovie.jpg");
            if ($item === "Красота") $img = Storage::url("aromo.jpg");
            if ($item === "Гигиена") $img = Storage::url("gigiena.jpg");
            if ($item === "Уход за волосами") $img = Storage::url("gigiena.jpg");
            if ($item === "Уход за полостью рта") $img = Storage::url("gigiena.jpg");
            if ($item === "Уход за лицом") $img = Storage::url("gigiena.jpg");
            if ($item === "Уход за кожей") $img = Storage::url("gigiena.jpg");

            DB::table("categories")->insert(
                    [
                        "img" => $img,
                        "slug" => Str::slug($item),
                        "title" => $item,
                        "description" => 'Описание категории - ' . $item
                    ]
                );
        }


    }
}
