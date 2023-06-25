@extends('layouts.all')

@php
    $title = "Акции и скидки на товары из индии";
    $description = "В данном разделе вы найдете индийские товары по самым выгодным ценам. Акции на индийские товары проходят в нашем магазине каждый день.";
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title="$title"></x-breadcrumbs>

<section class="category_section">
    <div class="_container">
        <h1 class="page_h2">Товары со скидкой</h1>

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

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
