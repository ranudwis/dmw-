<template>
    <v-main>
        <v-container>
            <div class="text-right">
                <v-btn fab color="primary" :to="{ name: 'dashboard.webtutor.create' }">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </div>

            <webtutor-table class="mt-4"></webtutor-table>
        </v-container>
    </v-main>
</template>

<script>
import WebtutorTable from './components/WebtutorTable'

export default {
    components: {
        WebtutorTable,
    }
}
</script>
