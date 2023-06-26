<footer>
    <div class="_container">
        <div class="pay_soc">
            <x-messanger></x-messanger>

            <img class="pay_system_img" src="{{asset("img/favicons/pay-icons.svg")}}" alt="Способы оплаты MiniIndia.ru">

            <p><?php echo date("Y") ?>© магазин MiniIndia.ru</p>
        </div>

        <div class="help">
            <h2>Каталог</h2>

            <nav>
                <ul>
                    @foreach ($all_cat as $cat_elem)
                        <li><a href="{{route('category', $cat_elem['slug'])}}">{{$cat_elem['title']}}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>

        <div class="inform">
            <h2>Меню</h2>
            <x-main-menu></x-main-menu>
        </div>

        <div class="podp">
            <form method="POST" action="{{route('send_subscribe')}}">
                @csrf
                <input name="emailsub" type="email" placeholder="e-mail">
                <button type="submit" class="btn btn_fill">Отправить</button>

            </form>
            @error('emailsub')
                    <p class="form_error">{{$message}}</p>
                @enderror
            <p>Подписывайтесь на новости и акции</p>
            <x-phone></x-phone>
        </div>
    </div>
</footer>
