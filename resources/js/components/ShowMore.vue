<template>

    <div class="tovars_wrap">
        <tovar-card v-for="item in addTovars" :key="item.id" :tovar="item"></tovar-card>
    </div>

  <div class="more_btn_wrap">
    <a @click.prevent="getMoreTovar" class="btn" href=""> Показать еще...</a>
  </div>

</template>

<script>
import { ref } from 'vue'
import TovarCard from './TovarCard.vue';


export default {
  components: { TovarCard },
    props: {
        catid:Number,
        inpage:Number,
        route:String,
    },

    setup(props) {

        let inpageCalc = props.inpage;

        let addTovars = ref([])

        const getMoreTovar = () => {

            let sep = (window.location.search == "")?"?=":""
            let searchStr = window.location.search+sep+"&catid="+props.catid+"&inpage="+inpageCalc+"&addcount="+props.inpage

            axios.get(props.route+searchStr)
            .then((response) => {
                inpageCalc = Number(inpageCalc) + Number(props.inpage)
                addTovars.value = addTovars.value.concat(response.data.product)
            })
            .catch( (error) => {
                console.log(error)
            });
        }

        return {
            getMoreTovar,
            addTovars
        }
    }
}
</script>

<style>

</style>
