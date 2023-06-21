export default class YandexMapLoader {

    constructor(element, center, hint) {
        this.map_dom_element = element
        this.map_coord = center
        this.hint = hint
        this.create()
    }


    initMap () {
        var myMap = new ymaps.Map("map", {
            // Координаты центра карты
            center: this.map_coord,
            // Масштаб карты
            zoom: 17,
            // Выключаем все управление картой
            controls: []
        });

        var myGeoObjects = [];

        // Указываем координаты метки
        myGeoObjects = new ymaps.Placemark(this.map_coord,{
                                        hintContent: '<div class="map-hint">'+this.hint+'</div>',
                                        balloonContent: '<div class="map-hint">'+this.hint+'</div>',
                                        }
                                        ,{
                                            iconColor: '#3caa3c'
                                        });

        var clusterer = new ymaps.Clusterer({
            clusterDisableClickZoom: false,
            clusterOpenBalloonOnClick: false,
        });

        clusterer.add(myGeoObjects);
        myMap.geoObjects.add(clusterer);
        // Отключим zoom
        myMap.behaviors.disable('scrollZoom');

    }


    create() {
        console.log(ymaps)
        ymaps.ready( () => {
            this.initMap()
        });
    }
}
