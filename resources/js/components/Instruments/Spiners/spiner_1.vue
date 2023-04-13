<template>

<div class="regular_class">
    <atom-spinner
        animation-duration="2000"
        :size="90"
        :color="currentColor"
    />
</div>

</template>

<script>
import {AtomSpinner, LoopingRhombusesSpinner, HollowDotsSpinner} from 'epic-spinners'

export default {
    components: {
        AtomSpinner, LoopingRhombusesSpinner, HollowDotsSpinner
    },
    data() {
        return {
            currentColor: "",
            colors: [
                // "red",
                "blue",
                // "green",
                // "indigo",
                // "purple",
                // "teal",
                // "orange",
                // "brown",
                // "deep-orange",
                // "blue-grey",
                // "cyan",
                // "white"
            ],
        }
    },

    mounted() {
        this.randomColors()
    },

    methods: {
        randomColors() {
            this.currentColor =
                this.colors[Math.floor(Math.random() * this.colors.length)];
        },
    }
}
</script>

<style lang="scss">

</style>
