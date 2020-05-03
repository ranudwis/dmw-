<template>
    <v-navigation-drawer app clipped>
        <v-list nav>
            <v-list-item
                v-for="(navigation, i) in navigations"
                :key="i"
                :to="navigation.to"
                :exact="navigation.exact"
                link
            >
                <v-list-item-icon>
                    <v-icon>{{ navigation.icon }}</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>{{ navigation.text }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
export default {
    data() {
        return {
            navigations: [
                {
                    to: { name: 'dashboard.index' },
                    exact: true,
                    icon: 'mdi-view-dashboard',
                    text: 'Dashboard'
                }, {
                    to: {},
                    icon: 'mdi-head-question',
                    text: 'Ujian'
                }, {
                    to: {},
                    icon: 'mdi-web',
                    text: 'Webtutor',
                }
            ]
        }
    }
}
</script>
