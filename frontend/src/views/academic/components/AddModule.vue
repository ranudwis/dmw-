<template>
    <v-dialog v-model="dialog" persistent max-width="600">
        <template #activator="{ on }">
            <v-btn v-on="on" color="primary">tambah modul</v-btn>
        </template>

        <v-card>
            <v-card-title>Tambah modul</v-card-title>

            <v-card-text>
                <v-checkbox v-model="anonymous" label="Anonim"></v-checkbox>

                <template v-if="! anonymous">
                    <v-text-field label="Nama" autofocus></v-text-field>
                    <v-text-field label="ID Line"></v-text-field>
                </template>

                <v-btn-toggle v-model="uploadType" dense mandatory>
                    <v-btn>
                        <v-icon left>mdi-upload</v-icon>
                        upload
                    </v-btn>

                    <v-btn>
                        <v-icon left>mdi-link</v-icon>
                        link file
                    </v-btn>
                </v-btn-toggle>

                <v-file-input v-if="uploadType == 0" label="File modul"></v-file-input>
                <v-text-field v-else label="URL modul" autofocus></v-text-field>
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
            uploadType: 0,
        }
    }
}
</script>
