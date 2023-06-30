<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Storage::disk('public')->put("st_1.webp", file_get_contents(public_path('blog/st_1.webp')), 'public');
        Storage::disk('public')->put("st_2.webp", file_get_contents(public_path('blog/st_2.webp')), 'public');
        Storage::disk('public')->put("st_3.webp", file_get_contents(public_path('blog/st_3.webp')), 'public');

        DB::table("blogs")->insert(
            [
                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Польза и помощь продуктов Аюрведы + скидка!",
                    'slug' => Str::slug("Польза и помощь продуктов Аюрведы + скидка!"),
                    'img' => Storage::url("st_1.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st1.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Нут наш насущный",
                    'slug' => Str::slug("Нут наш насущный"),
                    'img' => Storage::url("st_2.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st2.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Питание для каждой доши",
                    'slug' => Str::slug("Питание для каждой доши"),
                    'img' => Storage::url("st_3.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st3.html')))
                ],

                //-------------------------

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Польза и помощь продуктов Аюрведы + скидка!",
                    'slug' => Str::slug("Польза и помощь продуктов Аюрведы + скидка! #1"),
                    'img' => Storage::url("st_1.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st1.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Нут наш насущный",
                    'slug' => Str::slug("Нут наш насущный  #1"),
                    'img' => Storage::url("st_2.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st2.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Питание для каждой доши",
                    'slug' => Str::slug("Питание для каждой доши  #1"),
                    'img' => Storage::url("st_3.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st3.html')))
                ],

                //-------------------------

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Польза и помощь продуктов Аюрведы + скидка!",
                    'slug' => Str::slug("Польза и помощь продуктов Аюрведы + скидка! #2"),
                    'img' => Storage::url("st_1.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st1.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Нут наш насущный",
                    'slug' => Str::slug("Нут наш насущный  #2"),
                    'img' => Storage::url("st_2.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st2.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Питание для каждой доши",
                    'slug' => Str::slug("Питание для каждой доши  #2"),
                    'img' => Storage::url("st_3.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st3.html')))
                ],

                //-------------------------

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Польза и помощь продуктов Аюрведы + скидка!",
                    'slug' => Str::slug("Польза и помощь продуктов Аюрведы + скидка! #3"),
                    'img' => Storage::url("st_1.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st1.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Нут наш насущный",
                    'slug' => Str::slug("Нут наш насущный  #3"),
                    'img' => Storage::url("st_2.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st2.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Питание для каждой доши",
                    'slug' => Str::slug("Питание для каждой доши  #3"),
                    'img' => Storage::url("st_3.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st3.html')))
                ],

                //-------------------------

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Польза и помощь продуктов Аюрведы + скидка!",
                    'slug' => Str::slug("Польза и помощь продуктов Аюрведы + скидка! #4"),
                    'img' => Storage::url("st_1.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st1.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Нут наш насущный",
                    'slug' => Str::slug("Нут наш насущный  #4"),
                    'img' => Storage::url("st_2.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st2.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Питание для каждой доши",
                    'slug' => Str::slug("Питание для каждой доши  #4"),
                    'img' => Storage::url("st_3.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st3.html')))
                ],

                //-------------------------

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Польза и помощь продуктов Аюрведы + скидка!",
                    'slug' => Str::slug("Польза и помощь продуктов Аюрведы + скидка! #5"),
                    'img' => Storage::url("st_1.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st1.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Нут наш насущный",
                    'slug' => Str::slug("Нут наш насущный  #5"),
                    'img' => Storage::url("st_2.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st2.html')))
                ],

                [
                    'created_at' => date("y-m-d h:i:s"),
                    'title' => "Питание для каждой доши",
                    'slug' => Str::slug("Питание для каждой доши  #5"),
                    'img' => Storage::url("st_3.webp"),
                    'description' => clear_html(file_get_contents(public_path('blog/st3.html')))
                ],

            ]
        );
    }
}
