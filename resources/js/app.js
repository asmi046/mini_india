import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import CitySelect from "./components/CitySelect.vue"

import axios from 'axios'

import VueAxios from 'vue-axios'

import { VMaskDirective } from 'v-slim-mask'

const global_app = createApp({
    components:{
       CitySelect,
    }
})

global_app.use(VueAxios, axios)
global_app.directive('mask', VMaskDirective)
global_app.mount("#global_app");
