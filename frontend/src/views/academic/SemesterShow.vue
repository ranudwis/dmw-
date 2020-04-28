<template>
    <v-content>
        <v-container>
            <v-toolbar flat>
                <v-btn icon :to="{ name: 'academic.index' }" exact>
                    <v-icon>mdi-arrow-left</v-icon>
                </v-btn>

                <v-toolbar-title>
                    Semester 1
                </v-toolbar-title>
            </v-toolbar>

            <course-list class="mt-4"></course-list>
        </v-container>
    </v-content>
</template>

<script>
import CourseList from './components/CourseList'

export default {
    components: {
        CourseList
    }
}
</script>
