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
            <v-btn
                v-for="(navigation, i) in navigations"
                :key="i"
                text
                :to="navigation.to"
                exact="navigation.exact"
            >

                <v-icon left>{{ navigation.icon }}</v-icon>

                {{ navigation.text}}
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
    data() {
        return {
            navigations: [
                {
                    to: { name: 'home' },
                    exact: true,
                    icon: 'mdi-home',
                    text: 'home'
                }, {
                    to: {},
                    icon: 'mdi-book-open-page-variant',
                    text: 'soal & modul',
                }, {
                    to: { name: 'webtutor' },
                    icon: 'mdi-web',
                    text: 'webtutor'
                }, {
                    to: {},
                    icon: 'mdi-message',
                    text: 'feedback',
                }
            ]
        }
    }
}
</script>
