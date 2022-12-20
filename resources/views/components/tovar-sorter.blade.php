<script>
  function chenge_order(elem, target) {
    console.log(elem.value)
    let filter_form = document.querySelector(".tovar_filter")
    let order_elem = document.querySelector(".tovar_filter input[name="+target+"]")

    if (order_elem) {
        order_elem.value = elem.value
        filter_form.submit()
    }
  }
</script>

<div class="class_tovar_sorter">
    <form action="">
        <select onchange="chenge_order(this, 'order')" name="order" id="">
            <option {{ value_check('order')=='Сначала дешевые'?"selected":""}}>Сначала дешевые</option>
            <option {{ value_check('order')=='Сначала дорогие'?"selected":""}}>Сначала дорогие</option>
            <option {{ value_check('order')=='В алфавитном порядке'?"selected":""}}>В алфавитном порядке</option>
        </select>
        <select onchange="chenge_order(this, 'brand')" name="brand" id="">
            <option {{ value_check('brand')=='Бренд 1'?"selected":""}}>Бренд 1</option>
            <option {{ value_check('brand')=='Бренд 2'?"selected":""}}>Бренд 2</option>
            <option {{ value_check('brand')=='Бренд 3'?"selected":""}}>Бренд 3</option>
        </select>
    </form>
</div>
