@extends('layouts.all')

@php
    $title = "Результаты поиска по запросу: ".$search_str;
    $description = "Результаты поиска по запросу: ".$search_str;
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title="'Поиск по запросу: '.$search_str"></x-breadcrumbs>

<section class="category_section">
    <div class="_container">
        <h1 class="page_h2">Поиск по запросу: {{$search_str}}</h1>
            <div class="tovars_wrap">
                @foreach ($tovars as $tovar)
                    <x-tovar-card :tovar="$tovar"></x-tovar-card>
                @endforeach
            </div>
    </div>
</section>

<x-big-cat></x-big-cat>
<x-brand-slider></x-brand-slider>


@endsection
