<template>
    <!-- TODO: Refactoring file location -->
    <v-main>
        <v-container>
            <v-card v-for="(navigation, i) in navigations" :key="i" :to="navigation.to" class="my-2">
                <v-list-item>
                    <v-list-item-avatar>
                        <v-icon>{{ navigation.icon }}</v-icon>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title>{{ navigation.text }}</v-list-item-title>
                    </v-list-item-content>

                    <v-list-item-icon>
                        <v-icon>mdi-chevron-right</v-icon>
                    </v-list-item-icon>
                </v-list-item>
            </v-card>
        </v-container>
    </v-main>
</template>

<script>
export default {
    data() {
        return {
            navigations: [
                {
                    to: { name: 'feedback' },
                    icon: 'mdi-message',
                    text: 'feedback',
                }, {
                    to: {},
                    icon: 'mdi-account',
                    text: 'login'
                }
            ]
        }
    }
}
</script>
