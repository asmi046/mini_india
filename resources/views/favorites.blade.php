@extends('layouts.all')

@php
    $title = "Понравившиеся товары";
    $description = "Понравившиеся вам товары можно посмотреть здесь";
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title=" $title"></x-breadcrumbs>

<section class="standatr_section section_minheight">
    <div class="_container">
        <div class="text_blk">
            <h1>Понравившиеся товары</h1>

            <div class="main-prod-card d-flex favorites-page tovars_wrap ">

                @foreach ($products as $tovar)
                    <x-tovar-card :tovar="$tovar->tovar_data"></x-tovar-card>
                @endforeach

                <div class="empty_favorites">Жмите на ♡ на странице товара и добавляйте товар в избранное</div>
            </div>

        </div>
    </div>
</section>

<x-big-cat></x-big-cat>
<x-brand-slider></x-brand-slider>


@endsection
