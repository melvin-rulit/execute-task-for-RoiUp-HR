<template>

    <div class="container-fluid d-flex h-100  align-items-center main_container">

        <div class="row bg-white">

            <div class="col border rounded p-4">
                <p><span>Ви збираєтеся згенерувати нове посилання!</span></p>
                <p>Ваше поточне посилання буде видалено та згенерується нове</p>
                <p>Після цього ви знову потрапите на домашню сторінку</p>
                <div>
                    <b-button variant="secondary" class="otstup" @click="Generate_link()">Згенерувати нове посилання</b-button>

                    <a :href="'/home/' + link" class="otstup">Скасувати генерування</a>

                </div>
            </div>
        </div>

    </div>

</template>

<script>

import {mapActions, mapGetters} from "vuex";

export default {

    data(){
        return {
            links: 'home/',
        }
    },

    computed: {
        ...mapGetters(['UseNewLink']),

        link() {
            return this.$route.query.link;
        },

    },

    methods: {
        ...mapActions(['GenerateLink']),

        Generate_link(){

            // this.$store.dispatch('GenerateLink', {link: this.link})

            axios.post(`api/v1/send_value_for_get_new_link`, {link: this.link})
                .then((response) => {

                    let Link_1 = this.links;
                    // let Link_2 = this.UseNewLink;
                    let Link_2 = response.data;
                    let fullLink = Link_1 + Link_2;

                    this.$store.dispatch('DeleteLink', {link: this.link});

let loader = this.$loading.show({
                color: '#0080ff',
                backgroundColor: '#ffffff',
            });

            setTimeout(() => {

                loader.hide()

                this.$router.push(fullLink);
         
            }, 1000)



                })




        },

    }
}
</script>

<style lang="scss">
.otstup {
    margin-right: 90px;
}
</style>


