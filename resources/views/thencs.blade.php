@extends('layouts.all')

@php
    $title = "Благодарим за заказ";
    $description = "Спасибо за заказ наши специалисты свяжутся с Вами в ближайшее время";
@endphp

@section('title', $title)
@section('description', $description)

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

<x-big-cat></x-big-cat>
<x-brand-slider></x-brand-slider>


@endsection
