<template>
    <small-dialog
        v-model="dialog"
        @ok="save"
        :title="dialogTitle"
        okButton="upload"
        persistent
    >
        <template #activator="{ on }">
            <v-btn v-on="on" fab small color="primary">
                <v-icon v-if="exam.questionPath">mdi-pencil</v-icon>
                <v-icon v-else>mdi-plus</v-icon>
            </v-btn>
        </template>

        <v-file-input
            v-model="file"
            label="File PDf"
            prepend-icon="mdi-pdf-box"
            accept="application/pdf"
        ></v-file-input>

        <v-checkbox v-model="withBorder" label="Tambah Border"></v-checkbox>
    </small-dialog>
</template>

<script>
import api from '@/api'
import QuestionMaker from '@/dmw/pdf/QuestionMaker'
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
            withBorder: false,
            file: null,
        }
    },

    computed: {
        dialogTitle() {
            return this.exam.questionPath ? 'Ganti Soal' : 'Upload Soal'
        }
    },

    methods: {
        async save() {
            const questionMaker = new QuestionMaker()

            const file = await questionMaker.withBorder(this.withBorder).make(this.file)

            const requestUrl = `courseexam/upload/${this.$route.params.slug}/${this.$route.params.examId}/question`

            const formData = new FormData()
            formData.append('file', file)

            const response = await api.post(requestUrl, formData)

            console.log(response)
        }
    }
}
</script>
