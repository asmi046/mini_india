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
            <a class="cabinet_user_datd_btn" href="{{route('login')}}">Личьные данные</a>
            <a class="cabinet_exit_btn" href="{{route('logout')}}">Выйти из кабинета</a>
        </div>

        <div class="cabinet_content_panel">
            <form class="autch_form" action="{{route('save_user_data')}}" method="post">
                @csrf

                <input name="email" value="{{Auth::user()["name"]}}" required type="text" placeholder="e-mail*">
                @error('email')
                    <p class="form_error">{{$message}}</p>
                @enderror

                <input name="name" required value="{{Auth::user()["email"]}}" type="text" placeholder="Имя*">
                @error('name')
                    <p class="form_error">{{$message}}</p>
                @enderror

                <input name="password" required type="password"  placeholder="Пароль*">
                @error('password')
                    <p class="form_error">{{$message}}</p>
                @enderror

                <input name="password_confirmation" required type="password"  placeholder="Повторите пароль*">
                @error('password_confirmation')
                    <p class="form_error">{{$message}}</p>
                @enderror

                <button type="submit" class="btn">Сохранить данные</button>
            </form>
        </div>




    </div>
</section>


@endsection
