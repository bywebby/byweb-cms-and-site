/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('byweb-gallery', require('./components/GalleryComponent.vue').default);
Vue.component('byweb-ceny', require('./components/modules/calc/CenyComponent.vue').default);
Vue.component('byweb-reviews', require('./components/modules/reviews/ReviewsComponent').default);
Vue.component('byweb-form-modal', require('./components/modules/forms/ModalComponent').default);
Vue.component('byweb-back-top', require('./components/modules/BackTopComponent').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data: () => ({
        //определяет нажат бургер или нет
        statusBurgerMenu: false,
        //дефолтный класс menu-open в начале пуст, потом, когда статус statusBurgerMenu добавляется класс .menu-open
        menuClassOpen: '',
        menuBurgerButtonClass: '',
        //мобильное меню когда начинает отрабатывать
        width: 0,
        //подменю
        //класс подменю
        subMenuClassOpen: '',
        // статус меню
        statusSubMenuBurger: false,


        menuBurgerIcon: 'fa fa-bars',

    }),

    methods: {
        //работает и появляется если окно меньше 730px
        menuButton() {

            if (!this.checkWidth()) {
                return false;
            }

           // console.log(this.statusBurgerMenu);

            if (this.statusBurgerMenu) {
                this.menuClassOpen = '';
                this.menuBurgerIcon = 'fa fa-bars';
             } else {
                    //добавляет класс открытия меню
                this.menuClassOpen = 'open-menu';
                this.menuBurgerIcon = 'fa fa-arrow-down-wide-short';
                }
            return this.statusBurgerMenu = !this.statusBurgerMenu;
                // console.log(this.statusBurgerMenu);

        },
        openSubMenuBurger() {

            if (!this.checkWidth()) {
                return false;
            }

            if (this.statusSubMenuBurger) {
                this.subMenuClassOpen = '';
            } else {
                //добавляет класс открытия меню
                this.subMenuClassOpen = 'open-sub-menu';

            }

            return this.statusSubMenuBurger = !this.statusSubMenuBurger;
            // console.log(this.statusBurgerMenu);

        },
//блокирует функционал если меньше мобильной ширины
        checkWidth() {
            if (this.width <= 730) {
                return true;
            }
            return false;
        }
    },
        created() {
            //создаем функцию отслеживания разрешения экрана и запихиваем в константу
            const onResize = () => this.width = document.documentElement.clientWidth;

            //иницилизация
            onResize();
            //прослушка окна на событие расайза
            window.addEventListener('resize', onResize);


        },
    beforeDestroy() {
        //удаляет слушатели события дестрой когда отрабатывает hook destroy
        window.removeEventListener('resize', onResize);
    },



});
