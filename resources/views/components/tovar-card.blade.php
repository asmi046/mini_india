<div class="tovar_wrap main-prod-card" data-prodid="{{$tovar['sku']}}">
    <div class="bascet_count"> В корзине <span>1</span> шт </div>
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
        <a href="#" data-prodid="{{$tovar['sku']}}" class="btn cart_btn card_to_bascet_btn to_bascet">
            <span class="nadp">Купить</span>
            <span class="btnLoader"></span>
        </a>

        <a href="{{route('bascet')}}" class="btn card_bascet_btn ">Оформить</a>
    </div>
</div>
