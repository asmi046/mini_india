@extends('layouts.all')

@php
    $title = "Блог магазина";
    $description = "Мы с огромным удовольствием знакомим Вас с интересными материалами из области здоровья и красоты";
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title="$title"></x-breadcrumbs>

<section class="standatr_section">
    <div class="_container">
        <h1>{{$title}}</h1>

        @if (empty($posts))
            <h3>Статьи в разделе скоро появятся</h3>
        @endif

        <div class="blog_cards_in_page">
            @foreach ($posts as $item)
                <a href="{{route('blog_page', $item->slug)}}" class="blog_post_card">
                    <div class="img_wrapp">
                        <img src="{{$item->img}}" alt="{{$item->title}}">
                    </div>
                    <h2>{{$item->title}}</h2>
                    <div class="quote">
                        {{empty($item->quote)?$item->title:$item->quote}}
                    </div>
                    <div class="btn_wrap">
                        <span class="btn btn_fill">Подробнее</span>
                    </div>
                </a>
            @endforeach


        </div>

        <x-pagination :tovars="$posts"></x-pagination>
    </div>
</section>

<x-big-cat></x-big-cat>

@endsection
