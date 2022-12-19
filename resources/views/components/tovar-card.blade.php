<div class="tovar_wrap">
    <div class="like"></div>
    <a href="{{route('tovar', $tovar['slug'])}}" class="tovat_photo_wrap">
        @if (!empty($tovar['img']))
            <img src="{{asset($tovar['img'])}}" alt="{{$tovar['title']}}">
        @else
        <img src="{{asset('img/noPhoto.jpg')}}" alt="{{$tovar['title']}}">
        @endif
        <div class="labels">
            @if ($tovar['hit'])
                <div class="label_all label_hit">hit</div>
            @endif

            @if ($tovar['new'])
                <div class="label_all label_new">new</div>
            @endif

            @if (!empty($tovar['old_price']))
                <div class="label_all label_procent">%</div>
            @endif
        </div>
    </a>

    <h3 class="tovar_wrap_padding">{{$tovar['title']}}</h3>
    <div class="prices tovar_wrap_padding">
        @if (!empty($tovar['old_price']))
            <span class="old_price">{{$tovar['old_price']}}</span>
        @endif
        {{$tovar['price']}} <span class="rub_symbol">₽</span>
    </div>
    <div class="tovar_button_wrap tovar_wrap_padding">
        <a href="#" class="btn cart_btn">Купить</a>
    </div>
</div>
