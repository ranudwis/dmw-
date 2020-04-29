<template>
    <v-app>
        <navigation-bar v-if="$vuetify.breakpoint.mdAndUp"></navigation-bar>

        <router-view></router-view>

        <bottom-navigation v-if="$vuetify.breakpoint.smAndDown"></bottom-navigation>
    </v-app>
</template>

<script>
import NavigationBar from './NavigationBar'
import BottomNavigation from './BottomNavigation'

export default {
    components: {
        NavigationBar,
        BottomNavigation,
    }
}
</script>
