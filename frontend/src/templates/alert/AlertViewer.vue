<template>
    <v-snackbar
        v-model="visible"
        :color="color"
    >
        {{ message }}

        <template #action="{ attrs }">
            <v-btn @click="visible = false" v-bind="attrs" icon>
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </template>
    </v-snackbar>
</template>

<script>
import { get, sync } from 'vuex-pathify'

export default {
    computed: {
        visible: sync('alert/visible'),
        message: get('alert/message'),
        color: get('alert/color'),
    }
}
</script>
