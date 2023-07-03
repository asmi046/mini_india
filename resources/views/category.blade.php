@extends('layouts.all')

@php
    $title = (!empty($category_info['seo_title']))?$category_info['seo_title']:$category_info['title'];
    $description = (!empty($category_info['seo_description']))?$category_info['seo_description']:"Индийские товары в категории: ".$category_info['title'];;
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :category="$category_info"></x-breadcrumbs>

<section class="category_section">
    <div class="_container">
        <h2 class="page_h2">{{$category_info['title']}}</h2>

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

                @php
                    $inPage = isset($_REQUEST['page'])?(int)$_REQUEST['page'] * 16:16;
                @endphp
                <show-more route="/show_more_tovar" catid="{{$category_info['id']}}" inpage="{{$inPage}}"></show-more>
                <x-pagination :tovars="$tovars"></x-pagination>

            </div>
        </div>
    </div>
</section>

<x-big-cat></x-big-cat>
<x-brand-slider></x-brand-slider>

@endsection
