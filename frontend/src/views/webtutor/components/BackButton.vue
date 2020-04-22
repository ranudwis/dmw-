<template>
    <v-slide-x-transition>
        <v-btn
            v-show="showBackButton"
            text
            large
            color="primary"
            :to="{ name: 'webtutor.index' }"
            exact
        >
            <v-icon left>mdi-chevron-left</v-icon>
            Semua webtutor
        </v-btn>
    </v-slide-x-transition>
</template>

<script>
export default {
    computed: {
        showBackButton() {
            return this.$route.name !== 'webtutor.index'
        }
    },
}
</script>
