<template>
    <v-app>
        <navigation-bar v-if="$vuetify.breakpoint.mdAndUp"></navigation-bar>

        <router-view></router-view>

        <bottom-navigation v-if="$vuetify.breakpoint.smAndDown"></bottom-navigation>

        <alert-viewer></alert-viewer>
    </v-app>
</template>

<script>
import NavigationBar from './NavigationBar'
import BottomNavigation from './BottomNavigation'
import AlertViewer from '@/templates/alert/AlertViewer'

export default {
    components: {
        NavigationBar,
        BottomNavigation,
        AlertViewer,
    }
}
</script>
