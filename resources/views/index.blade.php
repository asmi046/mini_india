
@extends('layouts.all')

@php
    $title = "Товары из Индии по выгодным ценам";
    $description = "Товары из Индии высочайшего качества по выгодным ценам с доставкой по Москве и всей России";
@endphp

@section('title', $title)
@section('description', $description)

@section('content')

        <x-main-banner :banners="$banners"></x-main-banner>
        <x-main-category :categories="$categories"></x-main-category>

        <section class="main_sales">
            <div class="_container">
                <h2 class="main">Новинки</h2>

                <div class="swiper_obj">
                    <div class="swiper new_tovar_slider">
                        <div class="swiper-wrapper">
                            @foreach ($news as $tovar_element)
                                <x-tovar-card :tovar="$tovar_element" addclass="swiper-slide"></x-tovar-card>
                            @endforeach
                        </div>

                    </div>
                        <div id="nts_right" class="btn_all btn_right"></div>
                        <div id="nts_left" class="btn_all btn_left"></div>
                </div>
            </div>
        </section>

        <section class="main_sales">
            <div class="_container">
                <h2 class="main">Рекомендуем</h2>

                <div class="swiper_obj">
                    <div class="swiper new_tovar_slider">
                        <div class="swiper-wrapper">
                            @foreach ($recommend as $tovar_element)
                                <x-tovar-card :tovar="$tovar_element" addclass="swiper-slide"></x-tovar-card>
                            @endforeach
                        </div>

                    </div>
                        <div id="nts_right" class="btn_all btn_right"></div>
                        <div id="nts_left" class="btn_all btn_left"></div>
                </div>
            </div>
        </section>

        <x-advantages></x-advantages>

        <section class="main_new_tovar">
            <div class="_container">
                <h2 class="main">Распродажа</h2>

                <div class="tovars_wrap">
                    @foreach ($sales as $tovar_element)
                        <x-tovar-card :tovar="$tovar_element"></x-tovar-card>
                    @endforeach
                </div>
            </div>
        </section>

        <x-big-cat></x-big-cat>
        <x-brand-slider></x-brand-slider>

@endsection
