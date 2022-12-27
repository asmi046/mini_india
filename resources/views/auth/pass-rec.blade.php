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

        <form class="autch_form" action="{{route('pass_rec_do')}}" method="post">
            @csrf

            @if ($confirm)
                <p class="form_compleet">Новый парорль отправлен Вам на электронную почьту</p>
            @endif

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
