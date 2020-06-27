<template>
    <v-toolbar flat>
        <v-dialog v-model="exitDialog" max-width="300">
            <template #activator="{ on }">
                <v-btn v-on="on" icon>
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </template>

            <v-card>
                <v-card-title>Keluar?</v-card-title>
                <v-card-text>Webtutor yang ditulis akan hilang</v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn @click="exitDialog = false" text>batal</v-btn>
                    <v-btn @click="$router.go(-1)" text color="red">keluar</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-spacer></v-spacer>

        <v-btn @click="$emit('publish')" color="primary" :loading="isLoading('publish')">
            Publish
        </v-btn>
    </v-toolbar>
</template>

<script>
import { isLoading } from '@/dmw/loader'
export default {
    data() {
        return {
            exitDialog: false,
        }
    },

    methods: { isLoading }
}
</script>
