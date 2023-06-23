<section class="tbr">
    <div class="_container">
        <div class="tbr_wrap">
            @for ($i=0; $i<15; $i++)
                <a href="{{route('brand', $brands[$i]['slug'])}}" class="top_category">
                    <x-brand-circle :elem="$brands[$i]"></x-brand-circle>
                </a>
            @endfor
            <a class="all_brend_lnk" href="{{route("all_brand")}}">Смотреть все бренды</a>
        </div>
    </div>
</section>
