<template>
    <div>
        <v-skeleton-loader
            v-if="! semesters"
            type="list-item-avatar@10"
            class="my-4"
        ></v-skeleton-loader>

        <v-card
            v-else
            v-for="semester in semesters"
            :key="semester.id"
            :to="{ name: 'semester.show', params: { slug: semester.slug } }"
            class="my-4"
        >
            <v-list-item>
                <v-list-item-avatar color="primary">
                    <v-icon color="white">mdi-book-multiple</v-icon>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>
                        {{ semester.title }}
                    </v-list-item-title>
                </v-list-item-content>

                <v-list-item-icon>
                    <v-icon>mdi-chevron-right</v-icon>
                </v-list-item-icon>
            </v-list-item>
        </v-card>
    </div>
</template>

<script>
import api from '@/api'

export default {
    data() {
        return {
            semesters: null
        }
    },

    created() {
        api.get('semester')
            .then(response => {
                this.semesters = response.data.semesters
            })
    }
}
</script>
