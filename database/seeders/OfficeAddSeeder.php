<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class OfficeAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("options")->insert(
            [
                [
                    "name" => "office_adress",
                    'title' => 'Адрес офиса',
                    "value" => "Россия, Москва, 117303, Малая Юшуньская улица, 1к1 БЦ «Берлин», офис 1727",
                ],
                [
                    "name" => "office_coordinate",
                    'title' => 'Координаты офиса',
                    "value" => "55.65322306907056,37.59451249999997",
                ],
            ]
        );
    }
}
