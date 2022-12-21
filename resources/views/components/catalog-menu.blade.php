<div class="catalog_menu_wrapper_zt">
	<div class="close_catalog"></div>
</div>
<div class="catalog_menu_wrapper">
	<div class="catalog_menu">

        @foreach ($all_cat as $cat_elem)
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

        <x-service-btn></x-service-btn>
	</div>
</div>
