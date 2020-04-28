<template>
    <div>
        <v-card
            v-for="course in courses"
            :key="course.id"
            :to="{ name: 'course.show', params: { slug: course.slug } }"
            class="my-4"
        >
            <v-list-item>
                <v-list-item-avatar color="primary">
                    <v-icon color="white">mdi-book-open-page-variant</v-icon>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>{{ course.title }}</v-list-item-title>
                    <v-list-item-subtitle>{{ course.code }}</v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-icon>
                    <v-icon>mdi-chevron-right</v-icon>
                </v-list-item-icon>
            </v-list-item>
        </v-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            courses: [
                {
                    id: 1,
                    slug: 'alpro',
                    title: 'Dasar Pemrograman',
                    code: 'AIK1234'
                }, {
                    id: 2,
                    slug: 'alpro',
                    title: 'Dasar Pemrograman',
                    code: 'AIK1234'
                }, {
                    id: 3,
                    slug: 'alpro',
                    title: 'Dasar Pemrograman',
                    code: 'AIK1234'
                }, {
                    id: 4,
                    slug: 'alpro',
                    title: 'Dasar Pemrograman',
                    code: 'AIK1234'
                }
            ]
        }
    }
}
</script>
