@extends('layouts.all')

@section('title', "Страница товара")

@section('content')

<x-breadcrumbs></x-breadcrumbs>

<section class="tovar_page_photo_section">
    <div class="_container">
        <div class="tovar_galery">
            <div class="swiper_obj">
                <div class="swiper tovar_slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{asset('img/tovar_test/tov_0.jpg')}}" alt=""></div>
                        <div class="swiper-slide"><img src="{{asset('img/tovar_test/tov_1.jpg')}}" alt=""></div>
                    </div>

                    <div class="btn_all btn_right"></div>
                    <div class="btn_all btn_left"></div>
                </div>
            </div>
        </div>

        <div class="tovar_info_side">

        </div>
    </div>
</section>

<x-brand-slider></x-brand-slider>
<x-big-cat></x-big-cat>

@endsection
