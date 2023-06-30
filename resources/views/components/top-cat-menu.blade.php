@foreach ($allcat as $cat_elem)
<a href="{{route('category', $cat_elem['slug'])}}" class="top_category">

    <div class="cat_img">
        <div class="border">
            <div class="img_wrap">
                <img src="{{asset($cat_elem['img'])}}" alt="">
            </div>
        </div>
    </div>

    <span class="text">{{$cat_elem['title']}}</span>
</a>
@endforeach
