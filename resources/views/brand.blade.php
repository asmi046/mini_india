@extends('layouts.all')

@php
    $title = (!empty($brand_info['seo_title']))?$brand_info['seo_title']:$brand_info['title'];
    $description = (!empty($brand_info['seo_description']))?$brand_info['seo_description']:"Индийские товары бренда: ".$brand_info['title'];;
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :category="$brand_info"></x-breadcrumbs>

<section class="category_section">
    <div class="_container">
        <h2 class="page_h2">{{$brand_info['title']}}</h2>

        <div class="category_body">

            <div class="sidebar">
                @if (isset($sub_cat))
                    <x-tovar-filter :subcat="$sub_cat"></x-tovar-filter>
                @else
                    <x-tovar-filter></x-tovar-filter>
                @endif

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

