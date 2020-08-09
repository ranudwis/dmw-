<template>
    <div>
        <p v-if="information">
            {{ information }}
        </p>

        <small-dialog
            v-model="dialog"
            @ok="save"
            title="Informasi Ujian"
            subtitle="Berikan informasi tentang ujian seperti tidak tersedia soal, tidak ada ujian, dll"
            color="primary"
            okButton="simpan"
            loader="information"
        >
            <template #activator="{ on }">
                <v-btn v-on="on" color="primary">
                    <template v-if="information">
                        Edit informasi
                    </template>

                    <template v-else>
                        Beri informasi
                    </template>
                </v-btn>
            </template>

            <v-combobox v-model="information" autofocus label="Informasi"></v-combobox>
        </small-dialog>
    </div>
</template>

<script>
import api from '@/api'
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
            informationData: null
        }
    },

    computed: {
        information: {
            get() {
                return this.informationData || this.exam.information
            },
            set(newValue) {
                this.informationData = newValue
            }
        }
    },

    methods: {
        save() {
            api.put(`courseexm/${this.$route.params.slug}/${this.$route.params.examId}/information`, {
                information: this.infomration
            }, { loader: 'information' })
                .then(response => {
                    if (response.data.updated) {
                        this.dialog = false
                    }
                })
        }
    }
}
</script>
