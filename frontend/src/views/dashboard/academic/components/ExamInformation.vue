<template>
    <div>
        <p v-if="value.information">
            {{ value.information }}
        </p>

        <small-dialog
            v-model="dialog"
            @ok="save"
            title="Informasi Ujian"
            subtitle="Berikan informasi tentang ujian seperti tidak tersedia soal, tidak ada ujian, dll"
            color="primary"
            okButton="simpan"
            loading="information"
        >
            <template #activator="{ on }">
                <v-btn v-on="on" color="primary">
                    <template v-if="value.information">
                        Edit informasi
                    </template>

                    <template v-else>
                        Beri informasi
                    </template>
                </v-btn>
            </template>

            <v-text-field
                @keydown.enter="save"
                v-model="informationData"
                autofocus
                label="Informasi"
            ></v-text-field>
        </small-dialog>
    </div>
</template>

<script>
import api from '@/api'
import SmallDialog from '@/templates/dialog/SmallDialog'

export default {
    props: {
        value: {
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

    watch: {
        dialog(dialog) {
            if (dialog) {
                this.informationData = this.value.information
            }
        }
    },

    methods: {
        save() {
            api.put(`courseexam/${this.$route.params.slug}/${this.$route.params.examId}/information`, {
                information: this.informationData
            }, { loader: 'information' })
                .then(response => {
                    if (response.data.updated) {
                        this.$emit('input', {
                            ...this.value,
                            information: this.informationData
                        })

                        this.dialog = false
                    }
                })
        }
    },
}
</script>
