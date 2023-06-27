@extends('layouts.all')

@php
    $title = "Все бренды";
    $description = "Все бренды нашего магазина. Выберайте только самые лучьшие и качественные товары из Индии";
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title="$title"></x-breadcrumbs>

<section class="standatr_section">
    <div class="_container">
        <h1>{{$title}}</h1>

        <div class="brands_in_page">
            @foreach ($brands as $item)
                <a href="{{route('brand', $item['slug'])}}" class="barnd_wrap">

                    @if(!empty($item['img']))
                        <img src="{{asset($item['img'])}}" alt="{{$item['title']}}" title="{{$item['title']}}">
                    @else
                        <img src="{{asset("img/noPhoto.jpg")}}"  alt="{{$item['title']}}" title="{{$item['title']}}">
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>

<x-big-cat></x-big-cat>

@endsection
