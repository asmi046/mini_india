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
                    'title' => 'Обмен возврат',
                    "value" => (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')?file_get_contents(public_path('texts\obmen.txt')):file_get_contents(public_path('texts/obmen.txt')),
                ],

                [
                    "name" => "delivery",
                    'title' => 'Доставка',
                    "value" => (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')?file_get_contents(public_path('texts\delivery.txt')):file_get_contents(public_path('texts/delivery.txt')),
                ],

                [
                    "name" => "policy",
                    'title' => 'Политика конфиденциальности',
                    "value" => (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')?file_get_contents(public_path('texts\policy.txt')):file_get_contents(public_path('texts/policy.txt')),
                ],

                [
                    "name" => "phone",
                    'title' => 'Телефон',
                    "value" => "8 800 100 20 30",
                ],

                [
                    "name" => "email",
                    'title' => 'e-mail',
                    "value" => "info@mini-india.ru",
                ],

                [
                    "name" => "email_send",
                    'title' => 'e-mail для отправки',
                    "value" => "info@mini-india.ru, asmi046@gmail.com",
                ],

                [
                    "name" => "telegram_lnk",
                    'title' => 'Ссылка Telegram',
                    "value" => "#",
                ],

                [
                    "name" => "whatsapp_lnk",
                    'title' => 'Ссылка WhatsApp',
                    "value" => "#",
                ],

                [
                    "name" => "preim1_title",
                    'title' => 'Преимущество 1 - Заголовок',
                    "value" => "Преимущество нашего магазина #1",
                ],

                [
                    "name" => "preim1_text",
                    'title' => 'Преимущество 1 - Текст',
                    "value" => "Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты.",
                ],

                [
                    "name" => "preim2_title",
                    'title' => 'Преимущество 2 - Заголовок',
                    "value" => "Преимущество нашего магазина #2",
                ],

                [
                    "name" => "preim2_text",
                    'title' => 'Преимущество 2 - Текст',
                    "value" => "Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты.",
                ],

                [
                    "name" => "preim3_title",
                    'title' => 'Преимущество 3 - Заголовок',
                    "value" => "Преимущество нашего магазина #3",
                ],

                [
                    "name" => "preim3_text",
                    'title' => 'Преимущество 3 - Текст',
                    "value" => "Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты.",
                ],
            ]);
    }
}
