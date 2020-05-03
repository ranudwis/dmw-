<template>
    <v-app>
        <navigation-drawer></navigation-drawer>

        <navigation-bar></navigation-bar>

        <router-view></router-view>
    </v-app>
</template>

<script>
import NavigationBar from './NavigationBar'
import NavigationDrawer from './NavigationDrawer'

export default {
    components: {
        NavigationBar,
        NavigationDrawer,
    }
}
</script>
