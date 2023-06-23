<div class="cat_img">
    <div class="border">
        <div class="img_wrap">
            @if(!empty($elem['img']))
                <img src="{{asset($elem['img'])}}" alt="{{$elem['title']}}" title="{{$elem['title']}}">
            @else
                <img src="{{asset("img/noPhoto.jpg")}}"  alt="{{$elem['title']}}" title="{{$elem['title']}}">
            @endif
        </div>
    </div>
</div>
