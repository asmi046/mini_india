
<div class="class_tovar_sorter">
    <form action="">
        <select  class="category_filter_select" name="order" id="">
            <option {{ value_check('order')=='Сначала дешевые'?"selected":""}}>Сначала дешевые</option>
            <option {{ value_check('order')=='Сначала дорогие'?"selected":""}}>Сначала дорогие</option>
            <option {{ value_check('order')=='В алфавитном порядке'?"selected":""}}>В алфавитном порядке</option>
        </select>
        <select name="brand" class="category_filter_select" id="">
            <option {{ empty(value_check('brand'))?"selected":""}} value="%">Все бренды</option>
            @foreach ($brands as $item)
                <option {{ value_check('brand')==$item['title']?"selected":""}} value="{{$item['title']}}">{{$item['title']}}</option>
            @endforeach


        </select>
    </form>
</div>
