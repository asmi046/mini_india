@extends('layouts.all')

@php
    $title = "Авторизация в личьном кабинете"
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

            <input type="text" required name="email" palceholder="Логин">
            @error('email')
                <p class="form_error">{{$message}}</p>
            @enderror

            <input type="password" required name="password" palceholder="Пароль">
            @error('password')
                <p class="form_error">{{$message}}</p>
            @enderror
            <button type="submit" class="btn">Авторизоваться</button>
            <a href="{{route('register')}}">Регистрация</a>
            <a href="{{route('register')}}">Забыли пароль?</a>
        </form>
    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
