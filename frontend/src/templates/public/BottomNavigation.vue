<template>
    <v-bottom-navigation
        app
        color="primary"
    >
        <v-btn
            v-for="(navigation, i) in navigations"
            :key="i"
            :to="navigation.to"
            :exact="navigation.exact"
        >
            <span>{{ navigation.text }}</span>
            <v-icon>{{ navigation.icon }}</v-icon>
        </v-btn>

        <v-btn
            v-if="$vuetify.breakpoint.xsOnly"
            :to="{ name: 'more' }"
        >
            <v-icon>mdi-menu</v-icon>
        </v-btn>

        <template v-else>
            <v-btn :to="{ name: 'feedback' }">
                <span>Feedback</span>
                <v-icon>mdi-message</v-icon>
            </v-btn>

            <v-btn>
                <span>Login</span>
                <v-icon>mdi-account</v-icon>
            </v-btn>
        </template>
    </v-bottom-navigation>
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
                    text: 'Home'
                }, {
                    to: { name: 'academic.index' },
                    icon: 'mdi-book-open-page-variant',
                    text: 'Soal & Modul',
                }, {
                    to: { name: 'webtutor.index' },
                    icon: 'mdi-web',
                    text: 'Webtutor'
                }
            ]
        }
    }
}
</script>
