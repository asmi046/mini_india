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
        if ($item === "Красота") $img = Storage::url("aromo.jpg");
        if ($item === "Гигиена") $img = Storage::url("gigiena.jpg");

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
        Storage::disk('public')->put("aromo.jpg", file_get_contents(public_path('img//faker_img//aromo.jpg')), 'public');

        $all_cat = get_all_cat( base_path() . '/public/tovars/new_products_1.csv' );

        foreach($all_cat as $key => $value) {
            $this->add_to_base($key, "");
            echo "Добавлена категория: ".$key." \n\r";

            foreach ($value as $item) {
                $this->add_to_base($item, $key);
                echo "Добавлена категория: ".$item." Родительская: ".$key."\n\r";
            }
        }


    }
}
