<template>
    <small-dialog
        v-model="dialog"
        @ok="deleteLabel"
        :title="`Hapus label ${label.name}?`"
        subtitle="Aksi tidak dapat dikembalikan"
        color="red"
        loading="label"
        okButton="hapus"
    >
        <template #activator="{ on }">
            <v-btn v-on="on" icon color="red">
                <v-icon>mdi-delete</v-icon>
            </v-btn>
        </template>
    </small-dialog>
</template>

<script>
import api from '@/api'
import alert from '@/dmw/alert'
import SmallDialog from '@/templates/dialog/SmallDialog'

export default {
    components: {
        SmallDialog,
    },

    props: {
        label: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            dialog: false,
        }
    },

    methods: {
        deleteLabel() {
            api.delete(`label/${this.label.id}`, { loader: 'label' })
                .then(response => {
                    if (response.data.deleted) {
                        alert.success('label.deleted')
                    }

                    this.$emit('deleted')
                    this.dialog = false
                })

        },
    }
}
</script>
