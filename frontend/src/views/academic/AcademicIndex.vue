<template>
    <v-content>
        <v-container class="mt-8">
            <view-mode-selector></view-mode-selector>

            <semester-list class="mt-8"></semester-list>

            <course-list></course-list>
        </v-container>
    </v-content>
</template>

<script>
import ViewModeSelector from './components/ViewModeSelector'
import SemesterList from './components/SemesterList'
import CourseList from './components/CourseList'

export default {
    components: {
        ViewModeSelector,
        SemesterList,
        CourseList,
    },
}
</script>
