<template>
    <div>
        <p>
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
                <v-btn v-on="on" color="primary">Edit informasi</v-btn>
            </template>

            <v-combobox autofocus label="Informasi"></v-combobox>
        </small-dialog>
    </div>
</template>

<script>
import SmallDialog from '@/templates/dialog/SmallDialog'

export default {
    components: {
        SmallDialog,
    },

    data() {
        return {
            dialog: false,
        }
    }
}
</script>
