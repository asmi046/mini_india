<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

use DB;

class BannerSeeder extends Seeder
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
            Storage::disk('public')->put("banner1.jpg", file_get_contents(public_path('img\faker_img\banner1.jpg')), 'public');
            Storage::disk('public')->put("banner2.jpg", file_get_contents(public_path('img\faker_img\banner2.jpg')), 'public');
        } else {
            Storage::disk('public')->put("banner1.jpg", file_get_contents(public_path('img/faker_img/banner1.jpg')), 'public');
            Storage::disk('public')->put("banner2.jpg", file_get_contents(public_path('img/faker_img/banner2.jpg')), 'public');
        }

        DB::table("banners")->insert(
            [
                [
                    "img" => Storage::url("banner1.jpg"),
                    "title" => 'Баннер #1'
                ],

                [
                    "img" => Storage::url("banner2.jpg"),
                    "title" => 'Баннер #1'
                ]
            ]);

    }
}
