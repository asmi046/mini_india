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

            @endforeach
        </div>
    </div>
</section>

<x-big-cat></x-big-cat>

@endsection
