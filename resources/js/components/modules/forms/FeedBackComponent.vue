<template>
    <div>
        <a id="zakaz"></a>

        <div class='form-order pb-3' v-if="order">
            Ваш заказ: {{ order }}. Оформите форму ниже.
        </div>

        <form :action="formAction" method="post">
            <input type="hidden" name="_token" :value="csrf">
            <!--            данные с калькулятора по форме по событию с шины событий form-order-->
            <input type="hidden" name="order" :value="order">

            <div class="controls">

                <div class="input" :class="checkInputClass(formData.company.data, formData.company.countEl)">
                    <input type="text" name="company" placeholder="Компания" v-model="formData.company.data">
                </div>

                <div class="input" :class="checkInputClass(phone, 9)">
                    <input type="text" name="phone" placeholder="Телефон" v-model="phone">
                </div>

                <div class="input" :class="checkInputClass(mail, 3)">
                    <input type="text" name="mail" placeholder="E-mail" v-model="mail">
                </div>

            </div>

            <div class="textarea" :class="checkTextAreaClass(mainText, 3)">
                <textarea name="main-text" id="" cols="30" placeholder="Сообщение" v-model="mainText"></textarea>
            </div>


            <div v-if="ceckValiddate('Телефон', phone, 9) || ceckValiddate('E-mail', mail, 3) || ceckValiddate(formData.company.name, formData.company.data, formData.company.countEl)
            || ceckValiddate('Текст сообщения', mainText, 3)" >

                <p style='color:red' v-for="(item, index) in validateForm">
                    <span v-if="item !== 0">
                        Не хватает символов {{item}} в поле: {{index}}
                    </span>

                </p>

            </div>






            <button v-if="formData.company.data && mail && phone && mainText" type="submit" class="form-button">Отправить</button>
        </form>
    </div>

</template>

<script>

//импортируем шину событий
import {eventBus} from "../../../app";


export default {
    name: "FeedBackComponent",
    props: [
        'formAction'
    ],
    data: () => ({
        //берем токен с meta-тега
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        //данные заказа
        order: '',

        formData: {
            company: {
                data: '',
                countEl: 3,
                name: 'Компания'
            },

        },


        phone: '',
        mail: '',
        mainText: '',

        validateForm: {}

    }),


    methods: {

        checkInputClass: function (data, countEl) {

            // console.log(data.length);


            if (data.length >= countEl) {
                return 'check';
            }
            return false;
        },

        ceckValiddate: function (keyName, name, countEl) {

            if (name.length <= countEl && name.length != 0 && name.length > 0) {

                // console.log(this.validateForm);


                return this.validateForm[keyName] = countEl - name.length;

            }

            return false;

        },

        checkTextAreaClass: function (data, countEl) {
            if (data.length >= countEl) {
                return 'check';
            }
            return false;
        }


    },


    created() {
        //слушаель шины события
        eventBus.$on('form-order', data => {
            //записываем текст заказа по событию form-order
            this.order = '"' + data.title + '" на сумму: ' + data.sum + ' BYN';
        })
    }

}
</script>

<style scoped>

</style>
