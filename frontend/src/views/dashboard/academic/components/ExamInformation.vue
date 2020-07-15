<template>
    <div>
        <p v-if="information">
            Ujian diganti dengan tugas besar
        </p>

        <small-dialog
            v-model="dialog"
            title="Informasi Ujian"
            subtitle="Berikan informasi tentang ujian seperti tidak tersedia soal, tidak ada ujian, dll"
            color="primary"
            okButton="simpan"
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
    }
}
</script>
