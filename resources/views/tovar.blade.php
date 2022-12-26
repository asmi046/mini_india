@extends('layouts.all')

@php
    $title = (!empty($product['seo_title']))?$product['seo_title']:$product['title'];
    $description = (!empty($product['seo_description']))?$product['seo_description']:$product['title'];;
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :tovar="$product"></x-breadcrumbs>

<x-tovar-page-content :images="$images" :product="$product"></x-tovar-page-content>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
