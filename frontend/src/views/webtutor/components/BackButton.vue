<template>
    <v-slide-x-transition>
        <v-btn v-show="show" text large color="primary" @click="show=false">
            <v-icon left>mdi-chevron-left</v-icon>
            Semua webtutor
        </v-btn>
    </v-slide-x-transition>
</template>

<script>
export default {
    data() {
        return {
            show: true
        }
    }
}
</script>
