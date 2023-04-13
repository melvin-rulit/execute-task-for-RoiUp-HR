<template>

    <div class="container-fluid d-flex h-100  align-items-center">

        <div class="row otstup_row">

            <div class="col border rounded p-4 otstup_button">
                <b-button variant="secondary" class="otstup" @click="copyToClipBoard(link)">Копіювати посилання у буфер
                </b-button>

                <router-link :to="{name:'GenerateLink', query: {link}}" class="otstup">
                    <b-button variant="secondary">Згенерувати нове посилання</b-button>
                </router-link>

                <router-link :to="{name:'DeleteLink', query: {link}}" class="otstup">
                    <b-button variant="secondary">Деактивувати поточне посилання</b-button>
                </router-link>

                <router-link :to="{name:'FeelingLock', query: {link}}" class="otstup">
                    <b-button variant="secondary">Мені пощастить</b-button>
                </router-link>

            </div>
        </div>

        <div class="row">

            <div>
                <p>{{ returnResponse }}</p>
            </div>
        </div>
    </div>

</template>

<script>
import {mapGetters, mapActions} from "vuex";

export default {

    computed: {
        ...mapGetters(['UseLink']),

        link() {
            return this.$route.params.link;
        },

    },

    data() {
        return {
            links: 'home/',
            returnResponse: '',
        }
    },

    methods: {
        ...mapActions(['GenerateLink']),

        copyToClipBoard(link) {
            let Link_1 = this.links;
            let Link_2 = this.link;
            let fullLink = Link_1 + Link_2;
            navigator.clipboard.writeText(fullLink);
            this.returnResponse = 'Посилання скопійоване в буфер обміну'
        }
    }
}
</script>

<style lang="scss">

.otstup_button {
    margin-top: 40%;

    .otstup {
        margin-right: 20px;
    }
}

.otstup_row {
    margin-left: 25%;
}
</style>


