<template>

    <div class="container-fluid d-flex h-100  align-items-center main_container">

        <div class="row bg-white">

            <div class="col border rounded p-4">
                <p><span>Ви намагаєтеся видалити посилання!</span></p>
                <p>Ваше посилання буде видалено і по ньому Ви вже не потрапите на головну сторінку</p>
                <p>Після видалення Ви будете перенаправлені на сторінку реєстрації</p>
                <div>
                    <b-button variant="secondary" class="otstup" @click="Delete_link()">Видалити посилання</b-button>

                    <a :href="'/home/' + link" class="otstup">Скасувати видалення</a>

                </div>
            </div>
        </div>

    </div>

</template>

<script>

import {mapActions} from "vuex";

export default {

    data(){
        return {

        }
    },

    computed: {

        link() {
            return this.$route.query.link;
        },

    },

    methods: {
        ...mapActions(['DeleteLink']),

        Delete_link(){



            this.$store.dispatch('DeleteLink', {link: this.link});

            let loader = this.$loading.show({
                            color: '#0080ff',
                            backgroundColor: '#ffffff',
                        });

                        setTimeout(() => {

                            loader.hide()
                            this.$router.push({ name: 'Register' });
                        }, 1000)

           

        },

    }
}
</script>

<style lang="scss">
.otstup {
    margin-right: 90px;
}
</style>


