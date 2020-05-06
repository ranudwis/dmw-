<template>
    <v-navigation-drawer app width="280" clipped>
        <v-list nav>
            <template
                v-for="(navigation, i) in navigations"
            >
                <v-subheader v-if="typeof navigation === 'string'" :key="i">
                    {{ navigation }}
                </v-subheader>

                <v-list-item
                    v-else
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
            </template>
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
                    to: { },
                    icon: 'mdi-head-question',
                    text: 'Ujian'
                }, {
                    to: { },
                    icon: 'mdi-cog',
                    text: 'Pengaturan DMW++'
                }, {
                    to: { },
                    icon: 'mdi-clock',
                    text: 'Antrian'
                }, "Webtutor", {
                    to: { name: 'home' },
                    exact: true,
                    icon: 'mdi-tag',
                    text: 'Label'
                }, {
                    to: { },
                    icon: 'mdi-web-clock',
                    text: 'Menunggu Persetujuan'
                }, {
                    to: { },
                    icon: 'mdi-web',
                    text: 'Artikel'
                }, "Akademis", {
                    to: { },
                    icon: 'mdi-view-agenda',
                    text: 'Semester'
                }, {
                    to: { },
                    icon: 'mdi-file-clock',
                    text: 'Menunggu persetujuan',
                }, {
                    to: { },
                    icon: 'mdi-view-list',
                    text: 'Mata kuliah'
                }
            ]
        }
    }
}
</script>
