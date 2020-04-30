<template>
    <v-content>
        <v-container fluid class="pa-md-8">
            <v-row>
                <v-col cols="12" md="3" lg="2">
                    <back-button class="mb-4"></back-button>
                    <label-list></label-list>
                </v-col>

                <v-col cols="12" md="9" lg="10">
                    <router-view></router-view>
                </v-col>
            </v-row>
        </v-container>
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
