@extends('layouts.all')

@php
    $title = "404 - страница не найдена"
@endphp

@section('title', $title)
@section('border', "_bottom_border")

@section('content')

{{-- <x-breadcrumbs :title="$title"></x-breadcrumbs> --}}

<section class="standatr_section section_404 section_minheight">
    <div class="_container">
            <div class="blk404">
                <h1>404</h1>
                К сожалению страница не найдена...
            </div>

    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
