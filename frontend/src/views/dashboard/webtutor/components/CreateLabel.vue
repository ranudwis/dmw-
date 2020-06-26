<template>
    <v-dialog v-model="dialog" max-width="400">
        <template #activator="{ on }">
            <div class="text-right">
                <v-btn v-on="on" fab color="primary">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </div>
        </template>

        <v-card>
            <v-card-title>Buat Label</v-card-title>

            <v-card-text>
                <v-text-field v-model="labelName" autofocus label="Label"></v-text-field>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn @click="dialog = false" text>batal</v-btn>
                <v-btn @click="save()" text color="primary">buat</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import api from '@/api/api'
import alert from '@/dmw/alert'

export default {
    data() {
        return {
            dialog: false,
            labelName: null,
        }
    },

    methods: {
        save() {
            api
                .post('label', {
                    name: this.labelName
                })
                .then(() => {
                    alert.success('label.created')

                    this.reset()
                })
        },

        reset() {
            this.dialog = false
            this.labelName = null
        }
    }
}
</script>
