<template>
    <v-app-bar app color="primary" dark>
        <v-img
            alt="Logo"
            src="@/assets/images/logo_white.png"
            max-height="90%"
            max-width="50"
            contain
            class="shrink mx-2"
        ></v-img>

        <v-toolbar-title>DMW++</v-toolbar-title>

        <v-toolbar-items class="ml-4">
            <v-btn text>
                <v-icon left>mdi-home</v-icon>
                home
            </v-btn>
            <v-btn text>
                <v-icon left>mdi-book-open-page-variant</v-icon>
                soal &amp; modul
            </v-btn>
            <v-btn text>
                <v-icon left>mdi-web</v-icon>
                webtutor
            </v-btn>
        </v-toolbar-items>

        <v-spacer></v-spacer>

        <v-toolbar-items>
            <v-btn text>
                <v-icon left>mdi-account</v-icon>
                login
            </v-btn>
        </v-toolbar-items>
    </v-app-bar>
</template>

<script>
export default {
    name: 'NavigationBar',
}
</script>
