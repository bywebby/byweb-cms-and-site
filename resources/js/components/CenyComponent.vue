<template>
    <section class="row">
        <div class="calc">
            <!--заголовок модуля -->
            <h2>{{ items['module-title'] }}</h2>
        </div>
        <!--описание модуля -->
        <div class="calc-desc">
            {{ items["module-desc"] }}
        </div>

        <div class="calc-row">
            <div class="calc-item" v-for="(item, k) in items" v-if="typeof item === 'object'">
                <h4>{{ k }}</h4>
                <div class="calc-descprice" v-for="(i, id) in item">
                    <!--https://ru.vuejs.org/v2/guide/forms.html-->
                    <label v-for="j in i" v-if="j.price != 0">
                        <!--если иконка не пуста - выводим ее-->
                        <i v-if="j.class != ''" :class="j.class"></i>
                        <input :type="j.type" :value="j.price" :checked="myChecked(j.checked)"
                               :name="inputType(j.type, id)" >
                        {{ j.title }}: {{ j.price }} BYN
                    </label>

                    <label v-else>
                        <span class="hr">{{ j.title }}</span>
                    </label>

                </div>

                <div class="calc-price">{{myPrice(item)}} <small>BYN</small></div>

            </div>


        </div>
    </section>


</template>

<script>
export default {
    name: "CenyComponent",
    //входной json
    props: ['calcitems'],
    data: () => ({
        //число item-ов в строке
        totalPrice: [],

    }),
    methods: {
        debug: function (myVar) {
            console.log(myVar);
        },
        sumItem: function (item) {
            for (let id in item) {
                let price = 0;
                    for (let i in item[id]) {
                        if (item[id][i].checked) {
                            price += item[id][i].price;
                            this.totalPrice[id] = price;
                        }
                    }
            }
            return this.totalPrice;
        },
        myPrice: function (item) {

            let countEl = this.sumItem(item).length-1;

            if (countEl < 0) {
                return 0;
            } else {
                return this.sumItem(item)[countEl];
            }
        },
        //определяет выделен = 1 или нет = 0
        myChecked: function (myVar) {
            return myVar ? 'cheked' : '';
        },
        //если тип инпута radio то дает ему name для группировки выбора
        inputType: function (myVar, id) {
            return myVar == 'radio' ? 'pay_' + id : '';
        }
    },
    computed: {
        //распарсивается json
        items: function () {
            return JSON.parse(this.calcitems);
        },

    }

}
</script>

<style scoped>

</style>
