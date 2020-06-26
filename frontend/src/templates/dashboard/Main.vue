<template>
    <v-app>
        <navigation-drawer></navigation-drawer>

        <navigation-bar></navigation-bar>

        <router-view></router-view>

        <alert-viewer></alert-viewer>
    </v-app>
</template>

<script>
import NavigationBar from './NavigationBar'
import NavigationDrawer from './NavigationDrawer'
import AlertViewer from '@/templates/alert/AlertViewer'

export default {
    components: {
        NavigationBar,
        NavigationDrawer,
        AlertViewer,
    }
}
</script>
