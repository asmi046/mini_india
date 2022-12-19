<template>
    <a v-if="pageMode == 'head'" @click.prevent="openWin" href="#" class="city_select_lnk">{{curentCity}}</a>
    <div v-else>
        <div  class="select-prod-info__delivery-item">
            <p class="select-prod-info__delivery-item-text location-block__map_pin icon icon-ec_icon_map_pin_c">{{curentCity}}</p>
            <a @click.prevent="openWin" href="#" class="select-prod-info__delivery-item-text-link">Изменить</a>
        </div>

        <div class="select-prod-info__delivery-item">
            <p class="select-prod-info__delivery-item-text location-block__box icon-ec_icon_box ">Доставка</p>
            <p class="select-prod-info__delivery-item-text">{{deliveryStr}}</p>
            <a href="/dostavka" class="select-prod-info__delivery-item-text-link">Подробнее о доставке</a>
        </div>
    </div>

    <div  @click.self="cloaseWin()" class="popup popup_city" :class="[showWin ? 'active' : '']">
        <div class="popup__content">
            <div  class="popup__body" id="city_select">
                <div @click.prevent="cloaseWin()" class="popup__close" aria-label="Закрыть модальное окно"></div>
                <h2>Выберите свой город</h2>

                <div class="cityselectWrapper">
                    <input  v-model="searchStr" type="text" placeholder="Введите название города для поиска">

                    <div class="all_city_list_wrapper">
                        <ul class="all_city_list">
                            <li v-for ="(item) in filtredList" :key="item[0]">
                                <a href="#" @click.prevent="selectCity(item)">{{item[0]}}</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>


</template>

<script>
export default {
    data() {
        return {
            showWin:false,
            curentCity:"",
            deliveryStr:"",
            searchStr:"",
            filtredList:[],
            allCity: [
                ["Москва", "0-1 день в зависимости от района"],
                ["Санкт-Петербург", "2-3 дня по тарифам ТК"],
                ["Альметьевск", "3-4 дня по тарифам ТК"],
                ["Армавир", "3-4 дня по тарифам ТК"],
                ["Архангельск", "3-4 дня по тарифам ТК"],
                ["Астана: Казахстан", "3-4 дня по тарифам ТК"],
                ["Астрахань", "3-4 дня по тарифам ТК"],
                ["Балаково", "3-4 дня по тарифам ТК"],
                ["Барнаул", "3-4 дня по тарифам ТК"],
                ["Белгород", "3-4 дня по тарифам ТК"],
                ["Благовещенск", "3-4 дня по тарифам ТК"],
                ["Брянск", "3-4 дня по тарифам ТК"],
                ["Великий Новгород", "3-4 дня по тарифам ТК"],
                ["Владивосток", "3-4 дня по тарифам ТК"],
                ["Владимир", "3-4 дня по тарифам ТК"],
                ["Волгоград", "3-4 дня по тарифам ТК"],
                ["Вологда", "3-4 дня по тарифам ТК"],
                ["Воронеж", "3-4 дня по тарифам ТК"],
                ["Екатеринбург", "3-4 дня по тарифам ТК"],
                ["Иваново", "3-4 дня по тарифам ТК"],
                ["Ижевск", "3-4 дня по тарифам ТК"],
                ["Иркутск", "3-4 дня по тарифам ТК"],
                ["Йошкар-Ола", "3-4 дня по тарифам ТК"],
                ["Казань", "3-4 дня по тарифам ТК"],
                ["Калининград", "3-4 дня по тарифам ТК"],
                ["Калуга", "3-4 дня по тарифам ТК"],
                ["Кемерово", "3-4 дня по тарифам ТК"],
                ["Киров", "3-4 дня по тарифам ТК"],
                ["Кострома", "3-4 дня по тарифам ТК"],
                ["Краснодар", "3-4 дня по тарифам ТК"],
                ["Красноярск", "3-4 дня по тарифам ТК"],
                ["Курган", "3-4 дня по тарифам ТК"],
                ["Курск", "3-4 дня по тарифам ТК"],
                ["Липецк", "3-4 дня по тарифам ТК"],
                ["Магнитогорск", "3-4 дня по тарифам ТК"],
                ["Миасс", "3-4 дня по тарифам ТК"],
                ["Мурманск", "3-4 дня по тарифам ТК"],
                ["Набережные Челны", "3-4 дня по тарифам ТК"],
                ["Нальчик", "3-4 дня по тарифам ТК"],
                ["Нижневартовск", "3-4 дня по тарифам ТК"],
                ["Нижний Новгород", "3-4 дня по тарифам ТК"],
                ["Нижний Тагил", "3-4 дня по тарифам ТК"],
                ["Новокузнецк", "3-4 дня по тарифам ТК"],
                ["Новороссийск", "3-4 дня по тарифам ТК"],
                ["Новосибирск", "3-4 дня по тарифам ТК"],
                ["Ноябрьск", "3-4 дня по тарифам ТК"],
                ["Омск", "3-4 дня по тарифам ТК"],
                ["Орел", "3-4 дня по тарифам ТК"],
                ["Оренбург", "3-4 дня по тарифам ТК"],
                ["Орск", "3-4 дня по тарифам ТК"],
                ["Пенза", "3-4 дня по тарифам ТК"],
                ["Пермь", "3-4 дня по тарифам ТК"],
                ["Петрозаводск", "3-4 дня по тарифам ТК"],
                ["Псков", "3-4 дня по тарифам ТК"],
                ["Пятигорск", "3-4 дня по тарифам ТК"],
                ["остов-на-Дону", "3-4 дня по тарифам ТК"],
                ["Рыбинск", "3-4 дня по тарифам ТК"],
                ["Рязань", "3-4 дня по тарифам ТК"],
                ["Самара", "3-4 дня по тарифам ТК"],
                ["Саранск", "3-4 дня по тарифам ТК"],
                ["Саратов", "3-4 дня по тарифам ТК"],
                ["Симферополь", "3-4 дня по тарифам ТК"],
                ["Смоленск", "3-4 дня по тарифам ТК"],
                ["Сочи", "3-4 дня по тарифам ТК"],
                ["Ставрополь", "3-4 дня по тарифам ТК"],
                ["Старый Оскол", "3-4 дня по тарифам ТК"],
                ["Стерлитамак", "3-4 дня по тарифам ТК"],
                ["Сургут", "3-4 дня по тарифам ТК"],
                ["Сыктывкар", "3-4 дня по тарифам ТК"],
                ["Таганрог", "3-4 дня по тарифам ТК"],
                ["Тамбов", "3-4 дня по тарифам ТК"],
                ["Тверь", "3-4 дня по тарифам ТК"],
                ["Тольятти", "3-4 дня по тарифам ТК"],
                ["Томск", "3-4 дня по тарифам ТК"],
                ["Тула", "3-4 дня по тарифам ТК"],
                ["Тюмень", "3-4 дня по тарифам ТК"],
                ["Улан-Удэ", "3-4 дня по тарифам ТК"],
                ["Ульяновск", "3-4 дня по тарифам ТК"],
                ["Уссурийск", "3-4 дня по тарифам ТК"],
                ["Уфа", "3-4 дня по тарифам ТК"],
                ["Хабаровск", "3-4 дня по тарифам ТК"],
                ["Чебоксары", "3-4 дня по тарифам ТК"],
                ["Челябинск", "3-4 дня по тарифам ТК"],
                ["Череповец", "3-4 дня по тарифам ТК"],
                ["Чита", "3-4 дня по тарифам ТК"],
                ["Энгельс", "3-4 дня по тарифам ТК"],
                ["Ярославль", "3-4 дня по тарифам ТК"],
            ]
        }
    },



    mounted: function() {
        this.filtredList = this.allCity

        this.curentCity = (localStorage.getItem("city") != undefined)?localStorage.getItem("city"):"Москва"
        this.deliveryStr = (localStorage.getItem("delivery") != undefined)?localStorage.getItem("delivery"):"0-1 день в зависимости от района"
    },

    props:['pageMode'],

    watch: {
        searchStr(newVal) {
            this.filtredList = []
            for (let k = 0; k<this.allCity.length; k++) {
                if (this.allCity[k][0].indexOf(newVal) >= 0)
                    this.filtredList.push(this.allCity[k]);
            }
        }
    },
    methods:{
        cloaseWin() {
            this.showWin = false
        },
        openWin() {
            this.showWin = true
        },
        selectCity(item) {
            localStorage.setItem("city", item[0])
            localStorage.setItem("delivery", item[1])
            this.curentCity = item[0]
            this.deliveryStr = item[1]
            this.cloaseWin()
        }
    }
}
</script>

<style>
    .cityselectWrapper input{
        width:100%;
    }

    .all_city_list_wrapper {
        padding: 14px 18px;
        border: 1px solid #dbe0e5;
        margin-top: 20px;
        border-radius: 8px;
        min-height:330px;
    }

    .all_city_list {
        max-height: 300px;
        overflow: auto;
        display: inline-block!important;
        width: 100%;
        height: auto!important;
    }

    .all_city_list li{
        padding: 5px 0!important;
    }

    .all_city_list li a{
        color: black !important;;
    }
    .all_city_list li a:hover{
        color: #E13510!important;
        border-bottom: 1px dotted #E13510!important;
    }

     .popup_city .popup__body {
    padding: 30px 20px 20px 20px;
    width: 90%;
    max-width: 420px;
    background-color: white;
  }

  .popup_city .popup__body h2 {
    text-align: center;
    font-size: 22px;
    margin-bottom: 10px;
  }
</style>
