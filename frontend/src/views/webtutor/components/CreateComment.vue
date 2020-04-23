<template>
    <v-row>
        <v-col class="flex-grow-0">
            <v-icon color="primary" x-large class="mt-4">mdi-forum</v-icon>
        </v-col>

        <v-col cols="6">
            <v-row dense>
                <v-col>
                    <v-text-field label="Nama" autofocus></v-text-field>
                </v-col>
                <v-col>
                    <v-text-field label="ID Line"></v-text-field>
                </v-col>
            </v-row>

            <v-textarea rows="1" auto-grow label="Komentar"></v-textarea>

            <v-btn color="primary">beri komentar</v-btn>
        </v-col>
    </v-row>
</template>
