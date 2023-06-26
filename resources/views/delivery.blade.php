@extends('layouts.all')

@php
    $title = "Доставка";
    $description = "Информация о доставке ";
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
            {!! $options['delivery'] !!}
        </div>
    </div>
</section>

<x-big-cat></x-big-cat>
<x-brand-slider></x-brand-slider>


@endsection
