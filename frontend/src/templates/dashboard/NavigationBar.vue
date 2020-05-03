<template>
    <v-app-bar app clipped-left dark>
        <v-img
            alt="Logo"
            src="@/assets/images/logo_white.png"
            max-height="90%"
            max-width="50"
            contain
            class="shrink mx-2"
        ></v-img>

        <v-toolbar-title>DMW++ Admin</v-toolbar-title>

        <v-toolbar-items class="ml-4">
            <v-btn
                v-for="(navigation, i) in navigations"
                :key="i"
                text
                :to="navigation.to"
                :exact="navigation.exact"
            >

                <v-icon left>{{ navigation.icon }}</v-icon>

                {{ navigation.text}}
            </v-btn>
        </v-toolbar-items>

        <v-spacer></v-spacer>

        <v-toolbar-items>
            <v-btn text>
                <v-icon left>mdi-logout</v-icon>
                logout
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
                    to: { name: 'dashboard.index' },
                    icon: 'mdi-view-dashboard',
                    text: 'dashboard'
                }, {
                    to: { name: 'home' },
                    exact: true,
                    icon: 'mdi-home',
                    text: 'dmw++ home',
                }
            ]
        }
    }
}
</script>
