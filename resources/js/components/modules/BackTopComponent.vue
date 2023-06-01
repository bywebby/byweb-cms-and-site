<template>
    <div id="back-top" v-show="isActive">

        <a class='back-top-link' rel="nofollow" href="#">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>

</template>

<script>
// запусти для установки в консоли команду - тогда ниже пакеты установятся
// npm install --save @inotom/vue-go-top
//устанавливает пакеты для скролинга
// import { throttle } from 'throttle-debounce';

//указывает значение задердки
// const THROTTLE_DELAY = 100;

export default {
    name: "BackTopComponent",
    data: () => ({
        //дефолтное значение для скролинга
        scrollValueDefault: 300,
        //показывает скрол если true
        isActive: false,
        width: 500,
    }),
    methods: {
        //сравнивает скрол с дефолтным значение от которого отслеживать
        scrollData() { // toggle display by scrolling.
            this.isActive = window.pageYOffset > this.scrollValueDefault;
            // console.log(this.isActive);
        },

    },
    created() {

        //создаем функцию отслеживания разрешения экрана и запихиваем в константу
        const onResize = () => this.width = document.documentElement.clientWidth;
        //иницилизация
        onResize();
        //прослушка окна на событие расайза
        window.addEventListener('resize', onResize);
        //пишем ресайз
        // this.$on('hook:beforeDestroy', () => window.removeEventListener('resize', onResize));

        // console.log(this.width);

        //если ширина экрана больше, то включаем прослушку
        if(this.width > 500) {
            //подключаем слушатель скрола и кидаем callback - колбэк по слушателю будет менять свойства включени или выключен скролл
            window.addEventListener('scroll', this.scrollData);
        }

    },
    beforeDestroy() {
        //удаляет слушатели события дестрой когда отрабатывает hook destroy
        window.removeEventListener('scroll', this.scrollData);
        window.removeEventListener('resize', onResize);
    },
}
</script>

<style scoped>

</style>
