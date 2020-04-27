<template>
    <v-dialog v-model="dialog" persistent max-width="600">
        <template #activator="{ on }">
            <v-btn v-on="on" color="primary">berikan jawabanmu</v-btn>
        </template>

        <v-card>
            <v-card-title>Tambah jawaban</v-card-title>

            <v-card-text>
                <v-checkbox v-model="anonymous" label="Anonim"></v-checkbox>

                <template v-if="! anonymous">
                    <v-text-field label="Nama" autofocus></v-text-field>
                    <v-text-field label="ID Line"></v-text-field>
                </template>

                <v-file-input label="File jawaban (pdf)"></v-file-input>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn @click="dialog = false" text>batal</v-btn>
                <v-btn @click="dialog = false" text color="primary">tambah</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    data() {
        return {
            dialog: false,
            anonymous: false,
        }
    }
}
</script>
