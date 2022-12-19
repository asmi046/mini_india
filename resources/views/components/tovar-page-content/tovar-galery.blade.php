<div class="swiper_obj">
    <div class="swiper tovar_slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{asset($product['img'])}}" alt="{{$product['title']}}"></div>
            @foreach ($images as $img)
                <div class="swiper-slide"><img src="{{asset($img['link'])}}" alt="{{$img['alt']}}"></div>
            @endforeach


        </div>

        <div class="btn_all btn_right"></div>
        <div class="btn_all btn_left"></div>
    </div>
</div>
