@extends('layouts.all')

@php
    $title = (!empty($post['seo_title']))?$post['seo_title']:$post['title'];
    $description = (!empty($post['seo_description']))?$post['seo_description']:$post['title'];;
@endphp

@section('title', $title)
@section('description', $description)

@section('border', "_bottom_border")

@section('content')

<x-breadcrumbs :blog="$title" ></x-breadcrumbs>

<section class="standatr_section">
    <div class="_container">
        <div class="text_blk">
            <h1>{{$title}}</h1>
            <img class="blog_page_img" src="{{$post['img']}}" alt="{{$title}}">
            {!!$post['description']!!}
        </div>
    </div>
</section>

<x-big-cat></x-big-cat>
<x-brand-slider></x-brand-slider>


@endsection
