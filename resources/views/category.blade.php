@extends('layouts.all')

@section('title', "Категория товара")
@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :category="$category_info"></x-breadcrumbs>

<section class="category_section">
    <div class="_container">
        <h2 class="page_h2">{{$category_info['title']}}</h2>

        <div class="category_body">

            <div class="sidebar">
                <x-tovar-filter></x-tovar-filter>
            </div>

            <div class="category_tovars">

                <x-tovar-sorter></x-tovar-sorter>

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
