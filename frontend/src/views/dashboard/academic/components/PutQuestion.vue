<template>
    <small-dialog
        v-model="dialog"
        :title="dialogTitle"
        okButton="upload"
    >
        <template #activator="{ on }">
            <v-btn v-on="on" fab small color="primary">
                <v-icon v-if="exam.questionPath">mdi-pencil</v-icon>
                <v-icon v-else>mdi-plus</v-icon>
            </v-btn>
        </template>
    </small-dialog>
</template>

<script>
import SmallDialog from '@/templates/dialog/SmallDialog'

export default {
    props: {
        exam: {
            type: Object,
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

    computed: {
        dialogTitle() {
            return this.exam.questionPath ? 'Ganti Soal' : 'Upload Soal'
        }
    }
}
</script>
