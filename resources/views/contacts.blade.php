@extends('layouts.all')

@php
    $title = "Контакты";
    $description = "Контакты нашего интернет магазина индийских товаров. Свяжитесь с нами любым удобным способом.";
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs></x-breadcrumbs>

<section class="standatr_section">
    <div class="_container">
        <div class="text_blk">
            <h1>{{$title}}</h1>
            <a class="tel_in_page" href="tel:+74998411312">+7 (499) 841-13-12</a>
            <a class="tel_in_page" href="tel:+79776563786">+7 (977) 656-37-86</a>

            <h2>Магазин индийских товаров MiniIndia.ru</h2>
            <p><strong>Юридическое лицо:</strong> Индивидуальный предприниматель Шарма Вишал</p>
            <p><strong>ИНН:</strong> 7723 1055 6606</p>
            <p><strong>ОГРНИП:</strong> 32277 46002 25450</p>
            <p><strong>ОКПО:</strong> 2014 5297 95</p>
            <p><strong>Юридический адрес:</strong> 109144, РОССИЯ, г МОСКВА, ул ЛЮБЛИНСКАЯ, ДОМ 124, кв 21</p>

            <h2>Банковские реквизиты</h2>
            <p><strong>Банк:</strong> Точка ПАО Банка "ФК Открытие"</p>
            <p><strong>р/с:</strong> 4080 2810 1015 0030 0451</p>
            <p><strong>к/с:</strong> 3010 1810 8452 5000 0999</p>
            <p><strong>БИК:</strong> 044 525 999</p>
        </div>
    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
