<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use DB;

class BrandSeeder extends Seeder
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
            Storage::disk('public')->put("himalaya.jpg", file_get_contents(public_path('img\faker_img\himalaya.jpg')), 'public');
            Storage::disk('public')->put("dabur.jpg", file_get_contents(public_path('img\faker_img\dabur.jpg')), 'public');
            Storage::disk('public')->put("maharishi.jpg", file_get_contents(public_path('img\faker_img\maharishi.jpg')), 'public');
        } else {
            Storage::disk('public')->put("himalaya.jpg", file_get_contents(public_path('img/faker_img/himalaya.jpg')), 'public');
            Storage::disk('public')->put("dabur.jpg", file_get_contents(public_path('img/faker_img/dabur.jpg')), 'public');
            Storage::disk('public')->put("maharishi.jpg", file_get_contents(public_path('img/faker_img/maharishi.jpg')), 'public');
        }


        DB::table("brands")->insert(
            [
                [
                    "img" => Storage::url("himalaya.jpg"),
                    "slug" => 'himalaya',
                    "title" => 'Himalaya',
                    "description" => 'Бренд индийской продукции Himalaya'
                ],

                [
                    "img" => Storage::url("dabur.jpg"),
                    "slug" => 'dabur',
                    "title" => 'Dabur',
                    "description" => 'Бренд индийской продукции Dabur'
                ],

                [
                    "img" => Storage::url("maharishi.jpg"),
                    "slug" => 'maharishi',
                    "title" => 'Maharishi',
                    "description" => 'Бренд индийской продукции Maharishi'
                ],
            ]);
    }
}
