<div class="filter_wrapper">

    <div class="filter_mobile_panel">
        <span class="filter_icon"></span> Фильтры
    </div>

    <form action="" class="tovar_filter accordion">
        <div class="acc_blk">
            <div class="acc_head">
                <span>Стоимость</span>
            </div>
            <div class="acc_body">
                <div class="price_selector_wrapper">
                    <label class="price_start" for="price_start">
                        <span>От</span>
                        <input  value="60" type="text" id="price_start">
                    </label>

                    <label class="price_end" for="price_end">
                        <span>До</span>
                        <input  value="60 000" type="text" id="price_end">
                    </label>
                </div>
            </div>
        </div>

        <div class="acc_blk">
            <div class="acc_head">
                <span>Особенности</span>
            </div>
            <div class="acc_body">
                <label class="ch_label">
                    <input type="checkbox" checked value="Акции" name="osobennosti[]">
                    <span>Акции</span>
                </label>
                <label class="ch_label">
                    <input type="checkbox" value="Акции" name="osobennosti[]">
                    <span>Хит продаж</span>
                </label>
                <label class="ch_label">
                    <input type="checkbox" value="Акции" name="osobennosti[]">
                    <span>Скидка</span>
                </label>
            </div>
        </div>

        <div class="acc_blk">
            <div class="acc_head">
                <span>Категории</span>
            </div>
            <div class="acc_body">
                <label class="ch_label">
                    <input type="checkbox" checked value="Акции" name="osobennosti[]">
                    <span>Категория 1</span>
                </label>
                <label class="ch_label">
                    <input type="checkbox" value="Акции" name="osobennosti[]">
                    <span>Категория 2</span>
                </label>
                <label class="ch_label">
                    <input type="checkbox" value="Акции" name="osobennosti[]">
                    <span>Категория 3</span>
                </label>
            </div>
        </div>

        <div class="filter_control_blk">
            <button type="submit" class="btn btn_fill">Применить</button>
            <button type="submit" class="btn">Сбросить фильтр</button>
        </div>

    </form>
</div>
