@extends('layouts.all')

@php
    $title = "Политика конфиденциальности";
    $description = "Политика конфиденциальности и обработки персональных данных";
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
            {!!$options['policy']!!}
        </div>
    </div>
</section>

<x-big-cat></x-big-cat>
<x-brand-slider></x-brand-slider>


@endsection
