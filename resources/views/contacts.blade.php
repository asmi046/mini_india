@extends('layouts.all')

@php
    $title = "Контакты";
    $description = "Контакты нашего интернет магазина индийских товаров. Свяжитесь с нами любым удобным способом.";
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title="$title"></x-breadcrumbs>

<section class="standatr_section">
    <div class="_container">
        <div class="text_blk">
            <h1>{{$title}}</h1>
            <a class="tel_in_page" href="tel:+74998411312">+7 (499) 841-13-12</a>
            <a class="tel_in_page" href="tel:+79776563786">+7 (977) 656-37-86</a>

            <h2>{{shpw_option('mag_name', $options)}}</h2>
            <p><strong>Юридическое лицо:</strong> {{shpw_option('ur_l', $options)}}</p>
            <p><strong>ИНН:</strong> {{shpw_option('inn', $options)}}</p>
            <p><strong>ОГРНИП:</strong> {{shpw_option('ogrn', $options)}}</p>
            <p><strong>ОКПО:</strong> {{shpw_option('okpo', $options)}}</p>
            <p><strong>Адрес офиса:</strong> {{shpw_option('office_adress', $options)}}</p>

            <h2>Банковские реквизиты</h2>
            <p><strong>Банк:</strong> {{shpw_option('bank', $options)}}</p>
            <p><strong>р/с:</strong> {{shpw_option('rs', $options)}}</p>
            <p><strong>к/с:</strong> {{shpw_option('ks', $options)}}</p>
            <p><strong>БИК:</strong> {{shpw_option('bik', $options)}}</p>
        </div>

        <yandex-map coordinate="{{shpw_option('office_coordinate', $options)}}" adress="<b>MiniIndia.ru</b><br>{{shpw_option('office_adress', $options)}}"></yandex-map>

    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
