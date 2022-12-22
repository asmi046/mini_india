<div class="swiper_obj">
    <div class="swiper tovar_slider">
        <div class="swiper-wrapper">
            @if ($product['img'] == "")
            <div class="swiper-slide"><img src="{{asset('img/noPhoto.jpg')}}" alt="{{$product['title']}}"></div>
            @else
            <div class="swiper-slide"><img src="{{asset($product['img'])}}" alt="{{$product['title']}}"></div>
            @endif

            @foreach ($images as $img)
                <div class="swiper-slide"><img src="{{asset($img['link'])}}" alt="{{$img['alt']}}"></div>
            @endforeach

        </div>

        <div class="btn_all btn_right"></div>
        <div class="btn_all btn_left"></div>
    </div>
</div>
