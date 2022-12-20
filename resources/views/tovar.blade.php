@extends('layouts.all')

@section('title', "Страница товара")
@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :tovar="$product"></x-breadcrumbs>

<x-tovar-page-content :images="$images" :product="$product"></x-tovar-page-content>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
