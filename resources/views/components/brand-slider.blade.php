<section class="brands_slider">
    <div class="_container">
        <h2 class="main">Популярные бренды</h2>
        <div class="swiper_obj">
            <div class="swiper main_brand_slider">
                <div class="swiper-wrapper">
                    @foreach ($brands as $item)
                        <div class="swiper-slide"><img src="{{$item['img']}}" alt=""></div>
                    @endforeach

                    {{-- <div class="swiper-slide"><img src="{{asset('img/faker_img/dabur.jpg')}}" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('img/faker_img/himalaya.jpg')}}" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('img/faker_img/maharishi.jpg')}}" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('img/faker_img/bastofindia.jpg')}}" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('img/faker_img/dabur.jpg')}}" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('img/faker_img/maharishi.jpg')}}" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('img/faker_img/himalaya.jpg')}}" alt=""></div> --}}
                </div>

            </div>
            <div id="brand_btn_left" class="btn_all btn_left"></div>
            <div id="brand_btn_right" class="btn_all btn_right"></div>
        </div>

    </div>
</section>
