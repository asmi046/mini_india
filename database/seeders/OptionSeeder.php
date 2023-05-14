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
                    "name" => "mag_name",
                    'title' => 'Название магазина',
                    "value" => "Магазин индийских товаров MiniIndia.ru",
                ],

                [
                    "name" => "ur_l",
                    'title' => 'Юридическое лицо',
                    "value" => "Индивидуальный предприниматель Шарма Вишал",
                ],

                [
                    "name" => "inn",
                    'title' => 'ИНН',
                    "value" => "7723 1055 6606",
                ],

                [
                    "name" => "ogrn",
                    'title' => 'ОГРНИП',
                    "value" => "32277 46002 25450",
                ],

                [
                    "name" => "okpo",
                    'title' => 'ОКПО',
                    "value" => "2014 5297 95",
                ],

                [
                    "name" => "ur_adr",
                    'title' => 'Юридический адрес',
                    "value" => "109144, РОССИЯ, г МОСКВА, ул ЛЮБЛИНСКАЯ, ДОМ 124, кв 21",
                ],

                [
                    "name" => "bank",
                    'title' => 'Банк',
                    "value" => "ООО «Банк Точка»",
                ],

                [
                    "name" => "bik",
                    'title' => 'БИК',
                    "value" => "044525104",
                ],

                [
                    "name" => "rs",
                    'title' => 'Расчётный счёт',
                    "value" => "4080 2810 1015 0030 0451",
                ],

                [
                    "name" => "ks",
                    'title' => 'Корсчёт',
                    "value" => "3010 1810 7453 7452 5104",
                ],

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
                    "value" => "+7 (495) 841-13-12",
                ],

                [
                    "name" => "email",
                    'title' => 'e-mail',
                    "value" => "Miniindia@mail.ru",
                ],

                [
                    "name" => "email_send",
                    'title' => 'e-mail для отправки',
                    "value" => "Miniindia@mail.ru, asmi046@gmail.com",
                ],

                [
                    "name" => "telegram_lnk",
                    'title' => 'Ссылка Telegram',
                    "value" => "tg://resolve?domain=",
                ],

                [
                    "name" => "whatsapp_lnk",
                    'title' => 'Ссылка WhatsApp',
                    "value" => "https://wa.me/70000000000",
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
