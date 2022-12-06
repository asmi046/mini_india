<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mini India - индийские товары от производителя</title>
        <meta name="description" content="Новый сайт">

        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon256.png')}}" sizes="256x256">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon128.png')}}" sizes="128x128">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon64.png')}}" sizes="64x64">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon32.png')}}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon16.png')}}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{asset('/img/favicons/fav.png')}}" sizes="any">

        @vite([ 'resources/css/app.css',
                'resources/js/app.js',
                'public/css/main.css'
        ])
    </head>
    <body class="site_body">
        <header class="header">
            <div class="_container">
                <div class="city_selector">
                    <a href="#" class="city_select_lnk">Москва</a>
                </div>
                <a href="" class="logo">
                    <img src="{{asset('img/logo.svg')}}" alt="">
                </a>

                <div class="shop_button">
                    <a href="#" class="shop_buttons_ shop_button_cabinet"></a>
                    <a href="#" class="shop_buttons_ shop_button_favorites"></a>
                    <a href="#" class="shop_buttons_ shop_button_cart"></a>
                </div>
            </div>
        </header>

        <section>
            <div class="_container">

            </div>
        </section>
    </body>
</html>
