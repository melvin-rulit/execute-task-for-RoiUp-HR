<template>

<div class="regular_class">
    <fingerprint-spinner
        :animation-duration="1500"
        :size="53"
        color="#ff1d5e"
    />
</div>

</template>

<script>
import {AtomSpinner, LoopingRhombusesSpinner, HollowDotsSpinner, FingerprintSpinner} from 'epic-spinners'

export default {
    components: {
        AtomSpinner, LoopingRhombusesSpinner, HollowDotsSpinner, FingerprintSpinner
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
