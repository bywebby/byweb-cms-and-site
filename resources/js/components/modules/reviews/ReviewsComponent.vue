<template>
    <div class="reviews py-50">
        <div class="container">

            <div class="reviews-desc center pb-30">
                <div class="reviews-header">
                    <h2>{{ getModules[0].title }}</h2>
                </div>

                <div v-if="modules[0].desc" class="reviews-module-desc">
                    {{modules[0].desc }}
                </div>
            </div>

            <div class="reviews-items flex">

                    <div class="caroufredsel_prev"  @click="backReview"><<</div>

                <ul id="review-list">
                    <li v-for="item in nextItems" >
                        <div class="item-1 center">

                            <a v-if="item.description" :href="item.description">
                                <img class='reviews-img' :src="'uploads/'+item.thumbnail" alt="">
                            </a>
                            <img v-else class='reviews-img' :src="'uploads/'+item.thumbnail" alt="">

                            <div class="reviews-item-txt" v-html="item.content">
                                <p class="review-header">{{ item.title }}</p>
                            </div>

                            <div class="review-header">{{ item.title }}</div>


                        </div>
                    </li>
                </ul>

                    <div class="caroufredsel_next" @click="nextReview">>></div>
            </div>


        </div>

    </div>


</template>

<script>
    export default {
        name: "ReviewsComponent",
        //входные пропсы
        props: [
            'reviews',
            'modules',
        ],
        data: () => ({
            //дефолтное значение отзывов берется через mounted, поскольку напрямую функцию не записывает
           nextItems: null,
        }),
        methods: {
            //вперед
           nextReview(){
               //пушит первый элемент в конец обюекта
               this.getItems.push(this.getItems.shift());
               //переписывает дефольное значение на новое
               this.nextItems = this.getItems;
               return this.nextItems;
           },
            //назад
            backReview(){
               //последний элемент в обэекте делает первым
                this.getItems.unshift(this.getItems.pop())
                //переписывает дефольное значение на новое
                this.nextItems = this.getItems;
                return this.nextItems;
            },


        },
        computed: {
            //распарсивается json отзывов и записывает дефолтное значение отзывов
            getItems() {
                return this.nextItems = JSON.parse(this.reviews);
            },

//распарсивается json модулей
            getModules() {
                return JSON.parse(this.modules);
            },
        },
        mounted() {
            //в дату записывает дефолтное значени отзывов из БД
            this.getItems;

        }
    }
</script>
