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


        php_uname();

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            Storage::disk('public')->put("zdorovie.jpg", file_get_contents(public_path('img\faker_img\zdorovie.jpg')), 'public');
            Storage::disk('public')->put("gigiena.jpg", file_get_contents(public_path('img\faker_img\gigiena.jpg')), 'public');
            Storage::disk('public')->put("aromo.jpg", file_get_contents(public_path('img\faker_img\aromo.jpg')), 'public');
        } else {
            Storage::disk('public')->put("zdorovie.jpg", file_get_contents(public_path('img/faker_img/zdorovie.jpg')), 'public');
            Storage::disk('public')->put("gigiena.jpg", file_get_contents(public_path('img/faker_img/gigiena.jpg')), 'public');
            Storage::disk('public')->put("aromo.jpg", file_get_contents(public_path('img/faker_img/aromo.jpg')), 'public');
        }

        DB::table("categories")->insert(
            [
                [
                    "img" => Storage::url("zdorovie.jpg"),
                    "slug" => Str::slug('Здоровье'),
                    "title" => 'Здоровье',
                    "description" => 'Описание категории - Здоровье'
                ],

                [
                    "img" => Storage::url("gigiena.jpg"),
                    "slug" => Str::slug('Гигиена'),
                    "title" => 'Гигиена',
                    "description" => 'Описание категории - Гигиена'
                ],

                [
                    "img" => Storage::url("aromo.jpg"),
                    "slug" => Str::slug('Аромотерапия'),
                    "title" => 'Аромотерапия',
                    "description" => 'Описание категории - Аромотерапия'
                ],
            ]);
    }
}
