<template>
    <v-container>
        <v-toolbar flat>
            <v-btn icon :to="{ name: 'module.index' }" exact>
                <v-icon>mdi-arrow-left</v-icon>
            </v-btn>

            <v-toolbar-title>
                Semester 1
            </v-toolbar-title>
        </v-toolbar>

        <course-list></course-list>
    </v-container>
</template>

<script>
import CourseList from './components/CourseList'

export default {
    components: {
        CourseList
    }
}
</script>
