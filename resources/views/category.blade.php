@extends('layouts.all')

@section('title', "Категория товара")

@section('content')

<x-breadcrumbs></x-breadcrumbs>

<section class="category_section">
    <div class="_container">
        <h2 class="page_h2">{{$category_info['title']}}</h2>

        <div class="category_body">

            <div class="sidebar">
                <x-tovar-filter></x-tovar-filter>
            </div>

            <div class="category_tovars">
                <div class="class_tovar_sorter">
                    <form action="">
                        <select name="order" id="">
                            <option>Сначала дешевые</option>
                            <option>Сначала дорогие</option>
                            <option>В алфавитном порядке</option>
                        </select>
                        <select name="brand" id="">
                            <option>Бренд 1</option>
                            <option>Бренд 2</option>
                            <option>Бренд 3</option>
                        </select>
                    </form>
                </div>
                <div class="tovars_wrap">
                    @foreach ($tovars as $tovar)
                        <x-tovar-card :tovar="$tovar"></x-tovar-card>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
