@extends('layouts.all')

@php
    $title = "Личьный кабинет"
@endphp

@section('title', $title)
@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title="$title"></x-breadcrumbs>

<section class="standatr_section section_minheight" >
    <div class="_container">
        <h1>{{$title}}</h1>

        <div class="cabinet_control_panel">
            <a href="{{route('logout')}}">Выйти из кабинета</a>
        </div>
    </div>
</section>


@endsection
