import './bootstrap';

import { createStore } from 'vuex'

import {createApp} from 'vue/dist/vue.esm-bundler'
import CitySelect from "./components/CitySelect.vue"
import Bascet from "./components/bascet/Bascet.vue"
import YandexMap from './components/YandexMap.vue'
import ShowMore from './components/ShowMore.vue'
import ToBascetBtn from './components/ToBascetBtn.vue'
import ToFavoritesBtn from './components/ToFavoritesBtn.vue'
import Favorites from './components/Favorites.vue'

import axios from 'axios'

import VueAxios from 'vue-axios'

import { VMaskDirective } from 'v-slim-mask'

const global_app = createApp({
    components:{
       CitySelect,
       Bascet,
       YandexMap,
       ShowMore,
       ToBascetBtn,
       ToFavoritesBtn,
       Favorites
    },
    beforeCreate() {
        this.$store.dispatch('initialBascet');
        this.$store.dispatch('initialFavorites');
    }


})

const store = new createStore({
    state: {
      cart_count: 0,
      cart_tovars: {},

      favorites_count: 0,
      favorites_tovars: {}
    },

    mutations: {
        setCount (state, value) {
            state.cart_count = value
        },

        setTovars (state, value) {
            state.cart_tovars = value
        },


        setFavoritesCount (state, value) {
            state.favorites_count = value
        },

        setFavorites (state, value) {
            state.favorites_tovars = value
        },
    },

    getters: {
        cartCount: state => {
          return state.cart_count
        },

        favoritesCount: state => {
          return state.favorites_count
        }
    },

    actions: {

        initialBascet(context, value) {
                axios.get('/bascet/get')
                .then((response) => {
                    console.log(response.data.count)
                    context.commit('setCount', response.data.count)
                    context.commit('setTovars', response.data.position)
                })
                .catch(error => console.log(error));
        },

        initialFavorites(context, value) {
            axios.get('/favorites/get')
            .then((response) => {
                console.log(response.data.count)
                context.commit('setFavoritesCount', response.data.count)
                context.commit('setFavorites', response.data.position)
            })
            .catch(error => console.log(error));
        }
      }
  })


global_app.use(VueAxios, axios)
global_app.use(store)
global_app.directive('mask', VMaskDirective)
global_app.mount("#global_app");
