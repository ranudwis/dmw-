<template>
    <small-dialog
        v-model="dialog"
        @ok="deleteWebtutor"
        :title="`Hapus: ${webtutor.title}?`"
        subtitle="Aksi tidak dapat dibatalkan"
        color="red"
        okButton="hapus"
        loading="webtutor"
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
    props: {
        webtutor: {
            type: Object,
            required: true
        }
    },

    components: {
        SmallDialog,
    },

    data() {
        return {
            dialog: false,
        }
    },

    methods: {
        deleteWebtutor() {
            api.delete(`article/${this.webtutor.id}`, { loader: 'webtutor' })
                .then(response => {
                    if (response.data.deleted) {
                        alert.success('webtutor.deleted')

                        this.$emit('deleted')
                        this.dialog = false
                    }
                })
        }
    }
}
</script>
