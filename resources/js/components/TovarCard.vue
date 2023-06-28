<template>
    <div class="tovar_wrap main-prod-card"  :data-prodid="tovar.sku">
        <div class="bascet_count"> В корзине <span>1</span> шт </div>
        <div class="like to_favorites" :data-prodid="tovar.sku"></div>
        <a href="#" class="tovat_photo_wrap">
            <img v-if="tovar.img != ''" :src="tovar.img" :alt="tovar.title">
            <img v-else src="/img/noPhoto.jpg" :alt="tovar.title">

            <div class="labels">
                <div v-if="tovar.hit" class="label_all label_hit">hit</div>

                <div v-if="tovar.new" class="label_all label_new">new</div>

                <div v-if="tovar.old_price != 0" class="label_all label_procent">%</div>
            </div>
        </a>
        <h3 class="tovar_wrap_padding">{{tovar.title}}</h3>
        <div class="prices tovar_wrap_padding">

            <span v-if="tovar.old_price != 0" class="old_price">{{tovar.old_price}}</span>

            {{tovar.price}} <span class="rub_symbol">₽</span>
        </div>
        <div class="tovar_button_wrap tovar_wrap_padding">
            <a href="#" :data-prodid="tovar.sku" class="btn cart_btn card_to_bascet_btn to_bascet">
                <span class="nadp">Купить</span>
                <span class="btnLoader"></span>
            </a>
        </div>
    </div>

</template>

<script>


export default {

    props:{
        tovar:Object
    },

    setup(props) {
        return {
            tovar:props.tovar
        }
    }
}
</script>

<style>

</style>
