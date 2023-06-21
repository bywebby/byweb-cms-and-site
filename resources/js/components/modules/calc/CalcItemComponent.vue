<template>
    <div class="arrow">
        <h4>{{ titleKey }}</h4>
        <div class="calc-descprice" v-for="(i, id) in item">
            <label :for="idName(j.type, id, kitem)" v-for="(j, kitem) in i" v-if="j.price != 0">
                <!--если иконка не пуста - выводим ее-->
                <i v-if="(j.class != '') && (j.status == 1)" :class="j.class"></i>

<!--                :data забиндил, чтобы подсветить выбранные данне из базы, поскольку с v-model почему-то :checked не работает видимо из-за связывания с v-model массивом-->
                <input v-if="(j.type == 'checkbox') && (j.status == 1)" @click="delMyDef($event)"
                       :data="myDefCheckedCheckbox"
                       :type="j.type"
                       :name="inputName(j.type, id, kitem)"
                       :id="idName(j.type, id, kitem)"
                       :value="j.price"
                       v-model="calcCheckedData"
                >
                <!-- этот инпут нужен для корректной работы radio, к сожалению через v-model radio с checkbox по-разному ведут -->
                <input v-else-if="j.type == 'radio' && (j.status == 1)"
                       :data="myCheckedRadio"
                       :type="j.type"
                       :name="inputName(j.type, id, kitem)"
                       :id="idName(j.type, id, kitem)"
                       :value="j.price"
                       v-model="calcRadioData"
                >
                <span v-if="j.status == 1">{{ j.title }}: {{ j.price }} BYN</span>
            </label>
            <label v-else>
                <span class="hr">{{ j.title }}</span>
            </label>
        </div>

        <div class="calc-price">
            {{ calcResult }} <small>BYN</small>
        </div>


    </div>

</template>

<script>

export default {
    name: "CalcItemComponent",
    //входные данные
    props: ['item', 'titleKey'],
    data: () => ({
        calcCheckedData: [],
        calcRadioData: null,
        calcRes: 0,
        //определяет дефолтные значения стоят или динамические
        defStatus: true,


    }),
    methods: {
        debug: function (myVar) {
            console.log(myVar);
        },
        //если тип инпута radio то дает ему name для группировки выбора
        inputName: function (myVar, id, kitem) {
            return myVar == 'radio' ? 'pay_' + id : 'pay_' + id + '_' + kitem;
        },
        //формирует id input
        idName(myVar, id, kitem) {
            return myVar == 'radio' ? 'radio_' + id + '_' + kitem : 'checkbox_' + id + '_' + kitem;
        },
        delMyDef(event) {

            if (event) {
               return this.defStatus = false;

            }

        }
    },


    computed: {
//считает динамически результат
        calcResult: function () {
            //провереям есть данные в массиве
            if (this.calcCheckedData.length != 0) {
                let sum = 0;
                // суммирует элементы массива
                this.calcCheckedData.map((i) => sum += i);
                this.calcRes = sum;
            } else {
                this.calcRes = 0;
            }
            //если выделены радио, то он их суммирует
            if (this.calcRadioData != null) {

                // this.debug(this.calcRadioData);
                this.calcRes += this.calcRadioData;
            }
            // this.debug(this.calcRadioData);
            return this.calcRes;
        },
        myDefCheckedCheckbox: function () {
//если дефолтное состояние, то берем значения из базы данных админки, что прилетели в json
            if (this.defStatus) {
                for (let i of Object.values(this.item)) {
                    for (let kitem in i) {
                        if (i[kitem].price != 0 && i[kitem].type == 'checkbox' && i[kitem].checked == 1 && i[kitem].status == 1) {
                            //получаем все checkbox, где цены не равны 0 и опубликованы
                            this.calcCheckedData[kitem] = i[kitem].price;
                        }
                    }
                }
                return this.calcCheckedData;
            } else if (!this.defStatus) {
                //если имеются клики по чекбоксам, то сбразываем дефолтное состояния калькулятора через пустой массив
                return this.calcCheckedData = [];
            }

        },
        myCheckedRadio: function () {
            for (let i of Object.values(this.item)) {
                for (let kitem in i) {
                    if (i[kitem].price != 0 && i[kitem].type == 'radio' && i[kitem].checked == 1 && i[kitem].status == 1) {
                        //получаем все checkbox, где не равны 0
                        this.calcRadioData = i[kitem].price;
                    }
                }
            }
            // this.debug(this.calcCheckedData);
            // this.debug(this.calcRadioData);

            return this.calcRadioDataData;
        }
    },
}
</script>

<style scoped>



</style>

