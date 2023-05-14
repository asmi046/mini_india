@extends('layouts.all')

@php
    $title = "Обмен и возврат";
    $description = "Обмен и возврат товаров в нашем магазине осуществляется по правилам изложенным в нашем магазине";
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
            {!! shpw_option('obmen', $options) !!}
        </div>
    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
