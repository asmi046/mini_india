@extends('layouts.all')

@php
    $title = "Страница благодарности"
@endphp

@section('title', $title)
@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title="$title"></x-breadcrumbs>

<section class="standatr_section">
    <div class="_container">
        <div class="text_blk">
            <h1>Благодарим за заказ</h1>
            <p>Наши специалисты свяжутся с Вами в ближайшее время</p>
        </div>
    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
