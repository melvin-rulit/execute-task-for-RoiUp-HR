<template>


    <div class="container-fluid d-flex h-100  align-items-center main_container">

<!--  ----------------------------------------  Register Page  -->
        <div class="row bg-white shadow-sm">

            <div class="col border rounded p-4">
                <div class="zagolovok_register"><h3 class="text-center mb-4">Cторінка реєстрації</h3></div>

                    <div class="form-group">
                        <label>Ім'я користувача</label>
                        <input v-model="form.name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Номер телефону</label>
                        <input v-mask="'+380 (##)-###-##-##'" label="tel" v-model="form.phone_number" placeholder="+380" class="form-control">
                    </div>

                    <button class="btn btn-primary w-100"  @click="onRegister">Зареєструватися</button>

            </div>
        </div>

<!--      ----------------------------------------  Info Block   -->
        <div class="row">

                <div class="info_block">

                    <div v-if="ifClient_create">

                        <div v-if="if_create_client">
                            <p><span>Ви успішно зареєстровані!</span></p>
                            <p>Ваше посилання готове. Перейдіть по ній на головну сторінку</p>
                            <p>Або скопіюйте нижче гененоване посилання і вставте в адресний рядок вашого браузера</p>
                            <p>Після натискання на Enter - ви будете перенаправлені на головну сторінку</p>

                            <a :href="'/home/' + Get_unicum_link_client">/home/{{Get_unicum_link_client}}</a>

                        </div>

                        <div v-if="wait_create_client" class="regular_class">
                            <Spiner_1/>
                        </div>


                    </div>


                    <div v-else-if="error_input">
                        <p><span>Шановний клієнт</span></p>
                        <p>Перш ніж надіслати дані для реєстрації</p>
                        <p>необхідно заповнити усі поля форми.</p>

                    </div>

                    <div v-else>
                        <div v-if="main_massage">
                         <p><span>Шановний клієнт</span></p>
                        <p>Після реєстрації Ви отримаєте унікальне згенероване посилання</p>
                        <p>якою зможете пройти - на головну сторінку додатку.</p>
                        <p>Після закінчення 7 днів - посилання стане неактуальним.</p>
                        <p>Реєстрацію потрібно буде пройти знову або на головній сторінці</p>
                        <p>згенерувати нову.</p>
                        </div>

                    </div>

                </div>


        </div>
    </div>

</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {

    computed: {
        ...mapGetters(['Get_unicum_link_client']),


    },

        data() {
        return {
            form: {
                name: '',
                phone_number: '',
            },

            ifClient_create: false,
            wait_create_client: true,
            if_create_client: false,
            main_massage: true,
            error_input: false,
            errors: {}
        };
    },

    methods: {
        ...mapActions(['send_data_for_register_client']),

        onRegister() {

            if(this.form.name !== ''){
                this.$store.dispatch('send_data_for_register_client', {form: this.form})
            this.clear_data();
            this.block_after_send_data_create_client();vv
            }else {
this. error_input = true
this.main_massage = false
            }

        },

        block_after_send_data_create_client(){

                setTimeout(() => {

                    this.wait_create_client = false
                    this.if_create_client = true

                }, 3400)


        },

        clear_data() {

            this.errors = {};
            this.form = '';
            this.ifClient_create = true;

        },



    }
}

</script>


<style lang="scss">

/* Стиль для блока вывода ошибок */
span {
    color: red;
}
.regular_class {
    margin-left: 10vh;
}

.zagolovok_register h3 {
font-weight: bold;
}

.main_container {
    margin-top: 13%;
    margin-left: 30%;

    .info_block {
        margin-left: 15%;
    }
}

</style>
