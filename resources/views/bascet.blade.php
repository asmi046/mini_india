@extends('layouts.all')

@php
    $title = "Корзина"
@endphp

@section('title', $title)
@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs></x-breadcrumbs>

<section class="standatr_section">
    <div class="_container">
        <div class="text_blk">
            <h1>{{$title}}</h1>

        </div>
    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
