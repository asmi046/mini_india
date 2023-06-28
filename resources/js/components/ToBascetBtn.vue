<template>

<div class="tbComponent">

    <div v-if="!inBascet" class="b_counter_btn">
        <span @click="addToBascet">В корзину</span>
        <a @click.prevent="downCounter" href="">-</a>
        <input v-model="countToAdd" type="text">
        <a @click.prevent="upCounter" href="">+</a>
    </div>

    <div v-else class="oform_wrapper">
        <a :href="bascet"  class="b_counter_btn b_counter_btn_oform">
            <span >Оформить</span>
        </a>

        <div class="btn_in_card">
            <span>{{ inBascetCount }} шт.</span>
        </div>
    </div>
</div>

</template>

<script>

import { ref, computed, watch } from 'vue'
import { useStore } from 'vuex'
export default {

props: {
    sku:String,
    bascet:String
},

setup(props){

    const store = useStore()

    let countToAdd = ref(1)
    let inBascet = ref(false)
    let inBascetCount = ref(1)


    watch(() => store.getters.cartCount, function() {
        let inBascetElem = store.state.cart_tovars.find((elem) => { return elem.product_sku === props.sku})
        inBascet.value = (inBascetElem != undefined)
        inBascetCount.value =  (inBascetElem != undefined)?inBascetElem.quentity:0
    });

    const addToBascet = () => {
        let tiken = document.querySelector('meta[name="_token"]').content;

        axios.post('/bascet/add', {
            'product_id': props.sku,
            'addcount':countToAdd.value,
            '_token': tiken
        })
        .then(() => {
            store.dispatch('initialBascet')
            console.log(store.getters.cartCount)
        })
        .catch(error => console.log(error));
    }

    const upCounter = () => {
        countToAdd.value++
    }

    const downCounter = () => {
        if (countToAdd.value == 1) return;
        countToAdd.value--
    }

    return {
        inBascet,
        upCounter,
        downCounter,
        countToAdd,
        inBascetCount,
        addToBascet,
        bascet:props.bascet
    }
}

}
</script>

<style>

</style>
