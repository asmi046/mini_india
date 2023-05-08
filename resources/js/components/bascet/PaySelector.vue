<template>
<div class="pay_select">
    <div class="pay_typr yoo_cassa">
        Оплата картой онлайн
    </div>

    <div class="pay_typr sbol">
        Перевод на карту
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style>
    .pay_select {
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin: 10px 0;
        font-size: 12px;
    }

    .pay_typr::before {
        content:"";
        width:25px;
        height:25px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        left:5px;
        top: calc(50% - 12px);
    }

    .pay_typr {
        width:47%;
        height: 40px;
        border-radius: 9px;
        border: 1px solid #2A7D5A;
        padding: 5px 5px 5px 40px;
        position:relative;
        cursor:pointer
    }

    .yoo_cassa::before {
        content:"";
        position: absolute;
        background-image: url(img/icons/pay/yoo.svg);
    }

    .sbol::before {
        content:"";
        position: absolute;
        background-image: url(img/icons/pay/sber.svg);
    }

</style>
