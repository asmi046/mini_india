@extends('layouts.all')

@php
    $title = "Восстановление пароля"
@endphp

@section('title', $title)
@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :title="$title"></x-breadcrumbs>

<section class="standatr_section">
    <div class="_container">

        <h1>{{$title}}</h1>

        <form class="autch_form" action="{{route('login_do')}}" method="post">
            @csrf

            <input type="text" required name="email" palceholder="e-mail">
            @error('email')
                <p class="form_error">{{$message}}</p>
            @enderror

            <button type="submit" class="btn">Восстановить пароль</button>
            <a href="{{route('cabinet.home')}}">Вернуться к авторизации</a>
        </form>
    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
