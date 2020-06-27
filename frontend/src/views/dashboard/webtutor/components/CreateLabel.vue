<template>
    <small-dialog
        v-model="dialog"
        @ok="save"
        title="Buat Label"
        okButton="buat"
        loading="label"
    >
        <template #activator="{ on }">
            <div class="text-right">
                <v-btn v-on="on" fab color="primary">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </div>
        </template>

        <v-text-field v-model="labelName" autofocus label="Nama Label"></v-text-field>
        <v-text-field v-model="labelSlug" label="Nama Singkat"></v-text-field>
    </small-dialog>
</template>

<script>
import { kebabCase } from 'lodash'
import api from '@/api'
import alert from '@/dmw/alert'
import SmallDialog from '@/templates/dialog/SmallDialog'

export default {
    components: {
        SmallDialog,
    },

    data() {
        return {
            dialog: false,
            labelName: null,
            labelSlug: null,
        }
    },

    watch: {
        labelName(to) {
            this.labelSlug = kebabCase(to)
        }
    },

    methods: {
        save() {
            api
                .post('label', {
                    name: this.labelName,
                    slug: this.labelSlug
                }, { loader: 'label' })
                .then(() => {
                    alert.success('label.created')

                    this.$emit('created')
                    this.reset()
                })
        },

        reset() {
            this.dialog = false
            this.labelName = null
            this.labelSlug = null
        },
    }
}
</script>
