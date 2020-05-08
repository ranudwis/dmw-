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

        <v-spacer></v-spacer>

        <v-toolbar-items>
            <v-btn :to="{ name: 'home' }" exact text>
                <v-icon left>mdi-home</v-icon>
                home
            </v-btn>

            <v-btn text>
                <v-icon left>mdi-logout</v-icon>
                logout
            </v-btn>
        </v-toolbar-items>
    </v-app-bar>
</template>
