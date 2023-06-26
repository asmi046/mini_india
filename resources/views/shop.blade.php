@extends('layouts.all')

@php
    $title = "Все товары нашего магазина";
    $description = "Ознакомьтесь с полным ассортиментом индийских коваров нашего магазина MiniIndia";
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title="$title"></x-breadcrumbs>

<section class="category_section">
    <div class="_container">
        <h1 class="page_h2">Все товары нашего магазина</h1>

        <div class="category_body">

            <div class="sidebar">
                <x-tovar-filter :subcat="$sub_cat"></x-tovar-filter>
            </div>

            <div class="category_tovars">

                <x-tovar-sorter :brandlist="$brand_list"></x-tovar-sorter>

                <div class="tovars_wrap">
                    @foreach ($tovars as $tovar)
                        <x-tovar-card :tovar="$tovar"></x-tovar-card>
                    @endforeach
                </div>

                <x-pagination :tovars="$tovars"></x-pagination>

            </div>
        </div>
    </div>
</section>

<x-big-cat></x-big-cat>
<x-brand-slider></x-brand-slider>


@endsection
