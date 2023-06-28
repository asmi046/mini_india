<template>
  <div @click="addToBascet" :class="{'favorite_fill':in_favorites}" class="like to_favorites"></div>
</template>

<script>
import { ref, watch } from 'vue'
import { useStore } from 'vuex'
export default {
    props:{
        sku:String
    },

    setup(props) {

        const store = useStore()

        let in_favorites = ref(false)


        watch(() => store.getters.favoritesCount, function() {
            let inFavoritesElem = store.state.favorites_tovars.find((elem) => { return elem.product_sku === props.sku})
            in_favorites.value = (inFavoritesElem != undefined)

            console.log('FAVORITES+++!!!!!');
        });

        const addToBascet = () => {
            let tiken = document.querySelector('meta[name="_token"]').content;

            axios.post('/favorites/add', {
                'product_id': props.sku,
                '_token': tiken
            })
            .then((response) => {
                console.log
                store.dispatch('initialFavorites')

            })
            .catch(error => console.log(error));
        }

        return {
            in_favorites,
            addToBascet,
            sku:props.sku
        }
    }
}
</script>

<style>

</style>
