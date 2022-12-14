@extends('layouts.all')

@php
    $title = "Корзина";
    $description = "Корзина";
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
            <bascet></bascet>
        </div>
    </div>
</section>

<x-big-cat></x-big-cat>

@endsection
