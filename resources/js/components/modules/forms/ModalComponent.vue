<template>

    <div class="form-modal-out" v-show="formStatus" @click="formModalClose()">

        <div class="form-modal" @keyup.esc="formModalClose()" >

            <div class="form-modal-close" @click="formModalClose()"><i class="fa fa-x"></i></div>

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
    // config: {
    //     keyCodes: {
    //         esc: 27,
    //     }
    // },
    methods: {
        //закрытие модального окна по кнопке
        formModalClose(e) {
            return this.formStatus = false;
        },

    },
    computed: {
        getModalForm() {
            if(this.formStatusSuccess != '' || this.formStatusSuccess) {
                this.showModal;
            }
        },
//получает данные и показывает окно
        getJsonError() {
            if(this.formStatusErrors != '') {
                this.showModal;
                return this.getErrors = JSON.parse(this.formStatusErrors);
            }
        },

        showModal() {
           return this.formStatus = true;
        },



    },

    mounted() {
        // console.log('стаус ' + this.formStatusErrors);

        //метод в зависимости от пропса определяет показывать модальное окно или нет
        this.getModalForm;
        //переопределяет дефолтные данные если есть ошибки
        this.getJsonError;


    }
}
</script>
