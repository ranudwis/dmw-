<template>
    <div>
        <v-card v-for="module in modules" :key="module.id" class="mb-4">
            <v-list-item>
                <v-list-item-avatar>
                    <v-icon>mdi-book-open-variant</v-icon>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>{{ module.title }}</v-list-item-title>
                    <v-list-item-subtitle>{{ module.user }}</v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-icon>
                    <v-icon>mdi-open-in-new</v-icon>
                </v-list-item-icon>
            </v-list-item>
        </v-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            modules: [
                {
                    id: 1,
                    title: 'Bahasa Pemrograman Prosedural',
                    user: 'Admin'
                }, {
                    id: 2,
                    title: 'Bahasa Pemrograman Prosedural',
                    user: 'Random User'
                }
            ]
        }
    }
}
</script>
