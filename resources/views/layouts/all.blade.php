<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title') - Mini India</title>
        <meta name="description" content="@yield('description')">

        <meta property="og:locale" content="ru_RU" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="@yield('title') />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:url" content="{{route('home')}}" />
        <meta property="og:site_name" content="Магазин индийских товаров - Mini India" />
        <meta property="og:image" content="{{asset('img/og_img.jpg')}}" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta name="twitter:card" content="summary_large_image" />


        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon256.png')}}" sizes="256x256">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon128.png')}}" sizes="128x128">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon64.png')}}" sizes="64x64">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon32.png')}}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon16.png')}}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/fav.png')}}" sizes="any">

        <link rel="stylesheet" href="{{asset('js/lib/swiper/swiper-bundle.min.css')}}"/>

        <meta name="_token" content="{{ csrf_token() }}">

        <script src="{{asset('js/lib/swiper/swiper-bundle.min.js')}}"></script>
        <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <script src="//code.jivo.ru/widget/MA82UYhefF" async></script>

        @vite([
                'resources/css/app.css',
                'resources/js/app.js',

                'public/css/main.css',

                'public/css/brand-styles.css',
                'public/css/mobile_bottom_menu.css',
                'public/css/tovar_page_content.css',
                'public/css/tovar_card.css',
                'public/css/tovar_filter.css',
                'public/css/popup.css',
                'public/css/mainsearch.css',
                'public/css/pagination.css',
                'public/css/cart.css',
                'public/css/catalog_menu.css',
                'public/css/auth.css',
                'public/css/cabinet.css',

                'public/js/sliders.js',
                'public/js/mainsearch.js',
                'public/js/cart.js',
                'public/js/favorites.js',
                'public/js/catalog_menu.js',
                'public/js/filter.js',

        ])
    </head>
    <body class="site_body" id="global_app">



        <x-catalog-menu></x-catalog-menu>

        {{-- <x-top-brand-line :brands="$brands"></x-top-brand-line> --}}

        <header class="header">
            <div class="_container">
                <a href="{{route('home')}}" class="logo">
                    <img class="hor_logo" src="{{asset('img/logo_horizont.svg')}}" alt="">
                </a>

                <x-main-menu></x-main-menu>

                <div class="shop_registration">
                    <a href="{{route('favorites')}}" title="Понравившиеся товары" class="shop_buttons_ shop_button_favorites"></a>

                    <a href="{{route('bascet')}}" title="Корзина" class="shop_buttons_ shop_button_cart bascet_blk">
                        <span class="bascet_counter">1</span>
                    </a>

                    <a href="{{route('login')}}">Вход</a> <span>|</span> <a href="{{route('register')}}">Регистрация</a>

                </div>

                {{-- <div class="city_selector">
                    <city-select page-mode="head"></city-select>
                </div>
                <a href="{{route('home')}}" class="logo">
                    <img class="big_logo" src="{{asset('img/logo.svg')}}" alt="">
                    <img class="hor_logo" src="{{asset('img/logo_horizont.svg')}}" alt="">
                    <img class="mini_logo" src="{{asset('img/logo_mini.svg')}}" alt="">
                </a>

                <div class="shop_button">
                    @auth('web')
                        <a href="{{route('cabinet.home')}}" title="Перейти в личьный кабинет" class="shop_buttons_ shop_button_cabinet autch_stiker"></a>
                    @endauth

                    @guest
                        <a href="{{route('login')}}" title="Перейти к авторизации" class="shop_buttons_ shop_button_cabinet"></a>
                    @endguest



                    <a href="{{route('favorites')}}" title="Понравившиеся товары" class="shop_buttons_ shop_button_favorites"></a>
                    <a href="{{route('bascet')}}" title="Корзина" class="shop_buttons_ shop_button_cart bascet_blk">
                        <span class="bascet_counter">1</span>
                    </a>
                </div> --}}
            </div>
        </header>

        <section class="hed_menu_section @yield('border')">
            <div class="_container">
                <div class="cm_wrapper">
                    <a href="#" class="catalog_button catalog_button_1024 open_cat_menu"><span>Каталог</span></a>
                    <a href="#" class="catalog_button"><span>Каталог</span></a>
                    <div class="main_cat_dd_wrp">
                        <div class="main_cat_dd">
                            <x-top-cat-menu :allcat="$all_cat"></x-top-cat-menu>
                        </div>
                    </div>
                </div>

                <form class="serch_form" action="{{route('show_search_page')}}" method="GET">
                    <input type="text" name="search_str" class = "search_input search__input" placeholder="Поиск">
                    <div class="sub-load"></div>
                    <div class="sub-sclose"></div>
                    <button type="submit" class="search_btn"></button>

                    <div class="preSearchWrap"><div class="preSearchWrap_panel"></div></div>
                </form>

                <x-phone></x-phone>

                {{-- <x-service-btn></x-service-btn> --}}

                <x-messanger></x-messanger>
            </div>
        </section>

        @yield('content')

        <x-mobile-bottom-menu></x-mobile-bottom-menu>
        <x-footer-new :all_cat="$all_cat"></x-footer-new>

    </body>
</html>
