import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler'
import CitySelect from "./components/CitySelect.vue"
import Bascet from "./components/bascet/Bascet.vue"
import YandexMap from './components/YandexMap.vue'
import ShowMore from './components/ShowMore.vue'

import axios from 'axios'

import VueAxios from 'vue-axios'

import { VMaskDirective } from 'v-slim-mask'

const global_app = createApp({
    components:{
       CitySelect,
       Bascet,
       YandexMap,
       ShowMore
    }
})

global_app.use(VueAxios, axios)
global_app.directive('mask', VMaskDirective)
global_app.mount("#global_app");
