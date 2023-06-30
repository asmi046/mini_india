<template>
    <slot></slot>
</template>

<script>
import { ref } from 'vue'
export default {
    setup() {
        let show_cat = ref(false)

        const show_elem = () => {
            console.log('enter')
            show_cat.value = true
        }

        return {
            show_cat,
            show_elem
        }
    }
}
</script>

<style>

</style>
