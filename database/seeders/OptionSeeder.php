<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class OptionSeeder extends Seeder
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
                    "name" => "phone",
                    "value" => "8 800 100 20 30",
                ],

                [
                    "name" => "email",
                    "value" => "info@mini-india.ru",
                ],

                [
                    "name" => "email_send",
                    "value" => "info@mini-india.ru, asmi046@gmail.com",
                ],
            ]);
    }
}
