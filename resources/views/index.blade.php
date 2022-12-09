<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

        <section class="hed_menu_section">
            <div class="_container">
                <a href="#" class="catalog_button"><span>Каталог</span></a>

                <form class="serch_form" action="">
                    <input type="text" class = "search_input" placeholder="Поиск">
                    <button type="submit" class="search_btn"></button>
                </form>

                <div class="phone_head_blk">
                    <a href="tel:88004563344" class="phone">8 800 456 33 44</a>
                    <span>Бесплатный звонок по РФ</span>
                </div>

                <div class="dostavka_head_blk">
                    <a href="#" class="delivery">Доставка</a>
                    <a href="#" class="obmen">Обмен возврат</a>
                </div>

                <div class="messendger_head_blk">
                    <a href="#" class="whatsapp"></a>
                    <a href="#" class="telegram"></a>
                </div>
            </div>
        </section>

        <x-main-banner></x-main-banner>
        <x-main-category></x-main-category>

        <section class="main_sales">
            <div class="_container">
                <h2 class="main">Распродажа</h2>

                <div class="tovars_wrap">

                    @for ($i = 0; $i < 4; $i++)


                        <div class="tovar_wrap">
                            <div class="like"></div>
                            <div class="label_hit">hit</div>
                            <div class="tovat_photo_wrap">
                                <img src="{{asset('img/tovar1.jpg')}}" alt="">

                            </div>

                            <h3 class="tovar_wrap_padding">Наименование данного товара</h3>
                            <div class="prices tovar_wrap_padding">
                                <span class="old_price">2500</span> 1500 <span class="rub_symbol">₽</span>
                            </div>
                            <div class="tovar_button_wrap tovar_wrap_padding">
                                <a href="#" class="btn cart_btn">Купить</a>
                            </div>
                        </div>

                    @endfor


                </div>




            </div>
        </section>
    </body>
</html>
