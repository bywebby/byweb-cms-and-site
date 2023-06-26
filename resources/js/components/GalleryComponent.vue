<template>
    <div><a id="portfolio"></a>
        <div class="gallery">
            <div class="gallery-item" v-for="(item, k) in getJson" v-if="k < rowItems">
                    <div class="gallery-item-img" >
                            <img :src="'/uploads/' + item.thumbnail" :alt="item.title">
                        <div class="gallery-item-txt">
                                <div class="gallery-item-header">
                                    <a :href="item.description" rel="nofollow" target="_blank">{{ item.title }}</a>
                                </div>
                                <div class="gallery-item-link">
                                    <a :href="item.description" rel="nofollow" target="_blank"><i class="fa-solid fa-link"></i></a>
                                </div>
                        </div>
                    </div>
             </div>
        </div>

        <div class="gallery-btn center">
            <a @click="clickButton($event)" :class="clsBtn" :href="urlBtn">{{textButton}}</a>
        </div>

    </div>
</template>

<script>
export default {
    name: "GalleryComponent",
    props: ['items'],
    mounted() {
        // this.consoleLog()
    },
    data: () => ({
        //число item-ов в строке
        rowItems: 6,
        //число подгрузик элементов
        step: 6,
        //текст кнопки
        textButton: 'Подгрузить еще',
        textEndButton: 'Больше работ по запросу',
        urlBtn: '#',
        urlEndBtn: '#zakaz',
        //число объектов переданные из вьшки
        countAllItems: 0,
        //ширина экрана
        width: 0,
        //класс кнопки он потом поменяется на btn-none, когда закончатся элементы в галереи
        clsBtn: 'btn'
    }),
    methods: {
        clickButton: function(e) {
            //отменяем стандартное поведение ссылки по событию
            e.preventDefault();

            //увеличиваем вывод по шагу
            this.rowItems += this.step;
            //высчитываем сколько элементов в объекте и присваиваем свойству
            this.countAllItems = this.countItems;
            //сравниваем закончились элементы в объекте или нет относительно шага
            if (this.rowItems >= this.countAllItems) {
                this.textButton = this.textEndButton;
                this.urlBtn = this.urlEndBtn;
                //если закончились, то скрываем кнопку
                this.clsBtn = 'btn btn-color';
            }
        },
    },
    computed: {
        countItems: function () {
            return this.countAllItems = this.getJson.length;
        },
        getJson: function () {
            return JSON.parse(this.items);
        },
        //данная функция в зависимости от разрешения высчитывает шаг и число в строке item-ов
        adaptiveDesign: function () {
            //расширения экраны взяты с медия запосов в resources/sass/byweb/gallery.scss
           if(this.width <= 1350 && this.width > 590) {
                    this.rowItems = 3;
                    this.step = 3;
           } else if (this.width <= 590 && this.width > 420) {
               this.rowItems = 2;
               this.step = 2;
           } else if (this.width <= 420) {
               this.rowItems = 1;
               this.step = 1;
           }
        }
    },
    //когда создано по мативам https://qna.habr.com/q/653942
    created() {
        //создаем функцию отслеживания разрешения экрана и запихиваем в константу
        const onResize = () => this.width = document.documentElement.clientWidth;
        //иницилизация
        onResize();
        //прослушка окна на событие расайза
        window.addEventListener('resize', onResize);
        //пишем ресайз
        this.$on('hook:beforeDestroy', () => window.removeEventListener('resize', onResize));
        //меняем шаги и число item в зависимости от ширины экрана
        this.adaptiveDesign;
    },
}
</script>

<style scoped>
    .btn-color {
       background: #519174;
    }
</style>
