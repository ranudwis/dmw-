<template>
    <v-container fluid class="pa-0 tw-relative">
        <v-img
            src="@/assets/images/cover.jpg"
            class="coverImage"
        ></v-img>

        <v-row
            justify="center"
            align="center"
            align-sm="start"
            class="flex-column ma-0 pa-8 pa-sm-12 tw-absolute tw-inset-0"
        >
            <p
                class="white--text"
                :class="{
                    'display-2': $vuetify.breakpoint.smAndDown,
                    'display-4': $vuetify.breakpoint.mdAndUp,
                }"
            >
                DMW++
            </p>

            <p class="title white--text text-center text-sm-left">
                Database Modul dan Webutor Dikat HMIF Undip
            </p>

            <div style="width: 500px; max-width: 100%">
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

            <div style="width: 400px" class="mt-4 d-none d-md-block">
                <v-row>
                    <v-col cols="6">
                        <v-btn block x-large color="secondary" dark :to="{ name: 'academic.index' }">
                            <v-icon left>mdi-book-open-page-variant</v-icon>
                            soal &amp; modul
                        </v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn block x-large color="secondary" dark :to="{ name: 'webtutor.index' }">
                            <v-icon left>mdi-web</v-icon>
                            webtutor
                        </v-btn>
                    </v-col>
                </v-row>
            </div>
        </v-row>
    </v-container>
</template>
