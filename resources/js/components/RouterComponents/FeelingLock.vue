<template>

    <div class="container-fluid d-flex otstup_block">

        <div class="row bg-white">

            <div class="col border rounded p-4">

                <div class="zagolovok"><h2>Ця сторінка виводить інформацію про стан "Мені пощастить"</h2></div>

                <div class="row pt-5">

                    <div v-if="show_block" class="block-1">

                        <div class="col-2"><h2>Результат:</h2></div>


                        <b-alert variant="light" show class="block-1">

                            <div v-if="tern_on_spiner_wait" class="block-1_field">
                                <Spiner_2/>
                            </div>

                            <div class="block-2_field">
                                <b v-if="!tern_on_spiner_wait"><h2>{{
                                        result_lose_or_integer_after_save_feelLocky_in_DB
                                    }}</h2></b>
                            </div>

                        </b-alert>


                    </div>

                    <div v-else class="block-2">

                        <div class="col-2"><h2>Результат 3-х останніх натискань:</h2></div>
                        <div  v-for="item in result_history_fields" :key="item">

                                {{item.feel_locky}}
                        </div>

                    </div>

                </div>


                <div class="pt-4">

                    <b-button variant="secondary" class="otstup" @click="HistoryLock()">Історія</b-button>

                    <i class="fa-solid fa-house fonawesome-icons"></i> <a :href="'/home/' + link" class="otstup">Повернутися на головну</a>

                    <b-button variant="success" class="otstup" @click="GetRandom_integer_and_insert_DB()">Мені пощастить
                    </b-button>

                </div>
            </div>
        </div>

    </div>

</template>

<script>

export default {

    data() {
        return {
            result_lose_or_integer_after_save_feelLocky_in_DB: 'Натисніть на кнопку "Мені пощастить"',
            tern_on_spiner_wait: '',
            result_history_fields: '',
            Lose: 'LOSE',
            show_block: true,
        }
    },

    computed: {

        link() {
            return this.$route.query.link;
        },

    },


    methods: {

        HistoryLock() {

            axios.post('api/v1/query_history_for_FEEL_LOCK', {
                link: this.link,
            }).then((response) => {
                this.result_history_fields = response.data.data
                this.show_block = false;
            });
        },

        GetRandom_integer_and_insert_DB() {

            axios.post('api/v1/insert_and_FEEL_LOCK_result', {
                link: this.link,
            }).then((response) => {
                this.show_block = true;
                this.tern_on_spiner_wait = true;
                this.result_lose_or_integer_after_save_feelLocky_in_DB = response.data

                setTimeout(() => {
                    this.tern_on_spiner_wait = false;

                }, 3400)

            });
        }

    }
}
</script>

<style lang="scss">
.otstup {
    margin-right: 90px;
}

.zagolovok h2 {
font-weight: bold;
}

.block-1 {
    .block-1_field {
        //padding-left: 30%;
    }

    .block-2_field {
        //padding-left: 39%;
        padding-top: 26px;
    }
}


.otstup_block {
    margin-left: 33%;
    padding-top: 15%;
}
</style>


