<template>
  <div ref="mapInComponent" class="block__map" id="map"></div>
</template>

<script>
import YandexMapLoader from "../lib/map.js"
export default {

    props:['coordinate', 'adress'],

    mounted: function() {
        const mapClass = new YandexMapLoader(this.$refs.mapInComponent, this.coordinate.split(',').map(string => parseFloat(string)), this.adress)
    }
}
</script>

<style>
    .block__map {
        width: 100%;
        height: 250px;
        margin: 40px 0;
    }
</style>
