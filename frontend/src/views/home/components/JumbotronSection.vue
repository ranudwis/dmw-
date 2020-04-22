<template>
    <v-container fluid class="pa-0 tw-relative">
        <v-img src="@/assets/images/cover.jpg" min-height="500" max-height="70vh"></v-img>

        <v-row justify="center" class="flex-column ma-0 pa-12 tw-absolute tw-inset-0">
            <p class="display-4 white--text">
                DMW++
            </p>
            <p class="title white--text">
                Database Modul dan Webutor Dikat HMIF Undip
            </p>
            <div style="width: 500px">
                <v-text-field
                    autofocus
                    solo
                    rounded
                    full-width
                    hide-details
                    append-icon="mdi-magnify"
                    placeholder="Cari modul dan webtutor..."
                    >
                </v-text-field>
            </div>

            <div style="width: 400px" class="mt-4">
                <v-row>
                    <v-col cols="6">
                        <v-btn block x-large color="secondary" dark>
                            <v-icon left>mdi-book-open-page-variant</v-icon>
                            soal &amp; modul
                        </v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn block x-large color="secondary" dark>
                            <v-icon left>mdi-web</v-icon>
                            webtutor
                        </v-btn>
                    </v-col>
                </v-row>
            </div>
        </v-row>
    </v-container>
</template>
