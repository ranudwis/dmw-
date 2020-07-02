<template>
    <v-navigation-drawer v-model="navigationDrawer" app width="280" clipped>
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
import { sync } from 'vuex-pathify'

export default {
    computed: {
        navigationDrawer: sync('dashboard/navigationDrawer')
    },

    data() {
        return {
            navigations: [
                {
                    to: { name: 'dashboard.index' },
                    exact: true,
                    icon: 'mdi-view-dashboard',
                    text: 'Dashboard'
                }, {
                    to: { name: 'dashboard.exam.index' },
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
                    to: { name: 'dashboard.webtutor.label' },
                    exact: true,
                    icon: 'mdi-tag',
                    text: 'Label'
                }, {
                    to: { },
                    icon: 'mdi-web-clock',
                    text: 'Menunggu Persetujuan'
                }, {
                    to: { name: 'dashboard.webtutor.index' },
                    exact: true,
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
                    to: { name: 'dashboard.academic.course' },
                    icon: 'mdi-view-list',
                    text: 'Mata Kuliah'
                }
            ]
        }
    }
}
</script>
