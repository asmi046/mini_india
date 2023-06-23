<div class="catalog_menu_wrapper_zt">
	<div class="close_catalog"></div>
</div>
<div class="catalog_menu_wrapper">
	<div class="catalog_menu">
        <h2>Категории</h2>
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

        <h2>Бренды</h2>

        @foreach ($brands as $cat_elem)
        <a href="{{route('brand', $cat_elem['slug'])}}" class="top_category">

            <x-brand-circle :elem="$cat_elem"></x-brand-circle>


            <span class="text">{{$cat_elem['title']}}</span>
        </a>
    @endforeach

        <x-service-btn></x-service-btn>
	</div>
</div>
