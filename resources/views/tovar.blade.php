@extends('layouts.all')

@section('title', "Страница товара")
@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs></x-breadcrumbs>

<x-tovar-page-content></x-tovar-page-content>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection