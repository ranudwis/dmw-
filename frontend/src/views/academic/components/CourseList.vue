<template>
    <div>
        <v-skeleton-loader
            v-if="! courses"
            type="list-item-avatar-two-line@5"
            class="my-4"
        ></v-skeleton-loader>

        <v-card
            v-else
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
    props: {
        courses: {
            type: Array,
        }
    }
}
</script>
