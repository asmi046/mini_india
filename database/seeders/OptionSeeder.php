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
        php_uname();

        // if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {

        DB::table("options")->insert(
            [
                [
                    "name" => "obmen",
                    "value" => (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')?file_get_contents(public_path('texts\obmen.txt')):file_get_contents(public_path('texts/obmen.txt')),
                ],

                [
                    "name" => "delivery",
                    "value" => (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')?file_get_contents(public_path('texts\delivery.txt')):file_get_contents(public_path('texts/delivery.txt')),
                ],

                [
                    "name" => "policy",
                    "value" => (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')?file_get_contents(public_path('texts\policy.txt')):file_get_contents(public_path('texts/policy.txt')),
                ],

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

                [
                    "name" => "telegram_lnk",
                    "value" => "#",
                ],

                [
                    "name" => "whatsapp_lnk",
                    "value" => "#",
                ],

                [
                    "name" => "preim1_title",
                    "value" => "Преимущество нашего магазина #1",
                ],

                [
                    "name" => "preim1_text",
                    "value" => "Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты.",
                ],

                [
                    "name" => "preim2_title",
                    "value" => "Преимущество нашего магазина #2",
                ],

                [
                    "name" => "preim2_text",
                    "value" => "Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты.",
                ],

                [
                    "name" => "preim3_title",
                    "value" => "Преимущество нашего магазина #3",
                ],

                [
                    "name" => "preim3_text",
                    "value" => "Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты.",
                ],
            ]);
    }
}
