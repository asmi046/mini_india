<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> @yield('title') - Mini India</title>
        <meta name="description" content="Новый сайт">

        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon256.png')}}" sizes="256x256">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon128.png')}}" sizes="128x128">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon64.png')}}" sizes="64x64">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon32.png')}}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon16.png')}}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/fav.png')}}" sizes="any">

        <link rel="stylesheet" href="{{asset('js/lib/swiper/swiper-bundle.min.css')}}"/>

        @vite([ 'resources/css/app.css',
                'resources/js/app.js',

                'public/css/mobile_bottom_menu.css',
                'public/css/tovar_page_content.css',
                'public/css/tovar_card.css',
                'public/css/tovar_filter.css',
                'public/css/main.css',
        ])
    </head>
    <body class="site_body">
        <header class="header">
            <div class="_container">
                <div class="city_selector">
                    <a href="#" class="city_select_lnk">Москва</a>
                </div>
                <a href="" class="logo">
                    <img class="big_logo" src="{{asset('img/logo.svg')}}" alt="">
                    <img class="hor_logo" src="{{asset('img/logo_horizont.svg')}}" alt="">
                    <img class="mini_logo" src="{{asset('img/logo_mini.svg')}}" alt="">
                </a>

                <div class="shop_button">
                    <a href="#" class="shop_buttons_ shop_button_cabinet"></a>
                    <a href="#" class="shop_buttons_ shop_button_favorites"></a>
                    <a href="#" class="shop_buttons_ shop_button_cart"></a>
                </div>
            </div>
        </header>

        <section class="hed_menu_section @yield('border')">
            <div class="_container">
                <a href="#" class="catalog_button"><span>Каталог</span></a>

                <form class="serch_form" action="">
                    <input type="text" class = "search_input" placeholder="Поиск">
                    <button type="submit" class="search_btn"></button>
                </form>

                <x-phone></x-phone>

                <div class="dostavka_head_blk">
                    <a href="#" class="delivery">Доставка</a>
                    <a href="#" class="obmen">Обмен возврат</a>
                </div>

                <x-messanger></x-messanger>
            </div>
        </section>

        @yield('content')

        <x-mobile-bottom-menu></x-mobile-bottom-menu>
        <x-footer></x-footer>

        <script src="{{asset('js/lib/swiper/swiper-bundle.min.js')}}"></script>

        @vite([
            'public/js/sliders.js',
        ])
    </body>
</html>