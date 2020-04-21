<template>
    <v-app>
        <navigation-bar></navigation-bar>

        <router-view></router-view>
    </v-app>
</template>

<script>
import NavigationBar from './NavigationBar'

export default {
    components: {
        NavigationBar,
    }
}
</script>
