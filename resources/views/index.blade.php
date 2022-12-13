
@extends('layouts.all')

@section('title', "Главная страница")

@section('content')

        <x-main-banner></x-main-banner>
        <x-main-category></x-main-category>

        <section class="main_sales">
            <div class="_container">
                <h2 class="main">Новинки</h2>

                <div class="tovars_wrap">
                    @for ($i = 0; $i < 4; $i++)
                        <x-tovar-card></x-tovar-card>
                    @endfor
                </div>
            </div>
        </section>

        <x-advantages></x-advantages>

        <section class="main_new_tovar">
            <div class="_container">
                <h2 class="main">Новинки</h2>

                <div class="tovars_wrap">
                    @for ($i = 0; $i < 8; $i++)
                        <x-tovar-card></x-tovar-card>
                    @endfor
                </div>
            </div>
        </section>

        <x-brand-slider></x-brand-slider>
        <x-big-cat></x-big-cat>

@endsection
