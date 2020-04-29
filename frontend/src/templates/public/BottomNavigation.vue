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
                }, {
                    to: { name: 'more' },
                    icon: 'mdi-menu',
                }
            ]
        }
    }
}
</script>
