<template>
    <v-content>
        <v-row class="pa-8">
            <v-col cols="2">
                <back-button class="mb-4"></back-button>
                <label-list></label-list>
            </v-col>

            <v-col cols="10">
                <router-view></router-view>
            </v-col>
        </v-row>
    </v-content>
</template>

<script>
import BackButton from './components/BackButton'
import LabelList from './components/LabelList'

export default {
    components: {
        LabelList,
        BackButton,
    }
}
</script>
