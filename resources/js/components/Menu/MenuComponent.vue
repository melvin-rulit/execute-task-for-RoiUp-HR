<template>

    <b-table
        hover
        bordered="true"
        :items="UseСlient"
        :fields="fields"
        :no-border-collapse="false"
       >


        <template #cell(index)="data">

            <div class="border border-index-otstup">
                {{ data.index + 1 }}
            </div>

        </template>

        <template v-slot:cell(name)="row">

            <b-form-group>
                <input class="form-control "
                       v-on:keyup.enter="EditClient(row.item, 'name')"
                       v-model="row.item.name">
            </b-form-group>

        </template>


        <template v-slot:cell(phone_number)="row">

            <b-form-group>
                <input class="form-control"
                v-mask="'+380 (##)-###-##-##'"
                       v-on:keyup.enter="EditClient(row.item, 'phone_number')"
                       v-model="row.item.phone_number">
            </b-form-group>

        </template>

        <template v-slot:cell(##########)="row">

            <nav class=" navbar-expand-md">

                <div class="collapse navbar-collapse menu">
                    <ul class="navbar-nav">

                        <li>
                            <i class="fa-solid fa-chevron-down" @click="row.toggleDetails"></i>
                        </li>


                    </ul>
                </div>

            </nav>

        </template>


        <template #row-details="row">

            <b-row>
                <button type="button" class="btn btn-danger"  @click="DeleteClient(row.item)">Yuo want to remove {{ row.item.name}} from DB?</button>

            </b-row>

        </template>

    </b-table>


</template>

<script>
import {mapGetters, mapActions} from "vuex";

export default {

    mounted() {

        this.take_allClients_from_DB()

    },

    data() {
        return {
            fields: [
                {
                    key: 'index',
                    label: '№',
                },
                {
                    key: 'name',
                    label: 'Iмя користувача',
                },
                {
                    key: 'phone_number',
                    label: 'Номер телефону',
                },
                {
                    key: 'created_at',
                    label: 'дата створення',
                },                {
                    key: '##########',
                    label: 'Видалення користувача'
                }
            ],
roles:'',

        }
    },

    computed: {
        ...mapGetters(['UseСlient']),

    },

    methods: {
        ...mapActions(['GetAllClients']),

        take_allClients_from_DB() {

            this.GetAllClients()
        },



        //---------------------------------------------- Edit Client -------------------------------------------------------------//

        EditClient(row, row_name) {

            axios.post('api/v1/send_edit_client_value', {
                field_id: row.id,
                field_value_name: row.name,
                field_value_phone_number: row.phone_number,
                row_name: row_name
            }).then((response) => {

                let loader = this.$loading.show({
                            color: '#0080ff',
                            backgroundColor: '#ffffff',
                        });

                        setTimeout(() => {

                            loader.hide()
                        }, 1000)

                this.GetAllClients()

            });

        },

        DeleteClient(row) {

            axios.post('api/v1/send_value_Delete_client', {
                field_id: row.id,
            }).then((response) => {

                let loader = this.$loading.show({
                            color: '#0080ff',
                            backgroundColor: '#ffffff',
                        });

                        setTimeout(() => {

                            loader.hide()
                        }, 1000)

                this.GetAllClients()

            });
        },

    }
}
</script>

<style lang="scss" scoped>

.border-index-otstup {
    padding-left: 40%;
}
</style>
