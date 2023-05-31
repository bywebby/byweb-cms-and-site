<template>

    <div class="form-modal-out" v-show="formStatus" @click="formModalClose">
        <div class="form-modal">
            <div class="form-modal-close" @click="formModalClose">x</div>
            <div class="form-modal-header alert-success" v-if="formStatusSuccess">Ваш запрос отправлен!</div>

            <div  class='form-modal-errors' v-if="formStatusErrors">
                <div class="form-modal-header alert-danger">
                    Ошибки валидации формы!
                </div>

                <ul>
                    <li v-for="(v) in getJsonError">
                        {{ v }}
                    </li>
                </ul>

            </div>


        </div>
    </div>




</template>

<script>
export default {
    name: "ModalComponent",
    props: [
        'formStatusSuccess',
        'formStatusErrors'
    ],
    data: () => ({
        formStatus: false,
        getErrors: false,
    }),

    methods: {
        //закрытие модального окна по кнопке
        formModalClose() {



            return this.formStatus = false;
        },
    },
    computed: {
        getModalForm() {
            if(this.formStatusSuccess != '' || this.formStatusSuccess) {
                return this.formStatus = true;
            }
        },

        getJsonError() {

            if(this.formStatusErrors != '') {
                this.formStatus = true;
                return this.getErrors = JSON.parse(this.formStatusErrors);
            }



        },





    },

    mounted() {
        // console.log('стаус ' + this.formStatusErrors);

        //метод в зависимости от пропса определяет показывать модальное окно или нет
        this.getModalForm;
        this.getJsonError;


    }
}
</script>
