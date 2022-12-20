<section class="main_banner">
    <div class="slider">
        <div class="swiper main_banner_slider">
            <div class="swiper-wrapper">
                @foreach ($banners as $bn)
                    <div class="swiper-slide">
                        <img src="{{asset($bn['img'])}}" alt="{{$bn['title']}}">
                    </div>
                @endforeach

            </div>
        </div>

        <div class="banner_controll"></div>
    </div>
</section>
