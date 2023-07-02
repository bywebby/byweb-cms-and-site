<template>
    <div>
        <a id="zakaz"></a>

        <div class='form-order pb-3' v-if="order">
            Ваш заказ: {{order}}. Оформите форму ниже.
        </div>

        <form :action="formAction" method="post">
            <input type="hidden" name="_token" :value="csrf">
<!--            данные с калькулятора по форме по событию с шины событий form-order-->
            <input type="hidden" name="order" :value="order">

            <div class="controls">

                <div class="input">
                    <input type="text" name="company" placeholder="Компания" v-model="company">
                </div>

                <div class="input">
                    <input type="text" name="phone" placeholder="Телефон" v-model="phone">
                </div>

                <div class="input">
                    <input type="text" name="fio" placeholder="ФИО" v-model="fio">
                </div>

            </div>

            <div class="textarea">
                <textarea name="main-text" id="" cols="30" placeholder="Сообщение" v-model="mainText"></textarea>
            </div>

            <button v-if="company && fio && phone && mainText" type="submit" class="form-button">Отправить</button>
        </form>
    </div>

</template>

<script>

//импортируем шину событий
import { eventBus } from "../../../app";


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
        company: '',
        phone: '',
        fio: '',
        mainText: ''

    }),

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
