
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

                <div class="tovars_wrap">
                    @foreach ($news as $tovar_element)
                        <x-tovar-card :tovar="$tovar_element"></x-tovar-card>
                    @endforeach
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

        <x-brand-slider></x-brand-slider>
        <x-big-cat></x-big-cat>

@endsection
