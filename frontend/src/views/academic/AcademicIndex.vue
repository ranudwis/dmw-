<template>
    <v-main>
        <v-container class="mt-8">
            <view-mode-selector v-model="viewMode"></view-mode-selector>

            <semester-list v-if="viewMode === 'semester'" class="mt-8"></semester-list>

            <course-list :courses="courses" v-else></course-list>
        </v-container>
    </v-main>
</template>

<script>
import api from '@/api'
import ViewModeSelector from './components/ViewModeSelector'
import SemesterList from './components/SemesterList'
import CourseList from './components/CourseList'

export default {
    components: {
        ViewModeSelector,
        SemesterList,
        CourseList,
    },

    data() {
        return {
            viewMode: 'semester',
            courses: null,
        }
    },

    watch: {
        viewMode(to) {
            if (to === 'course') {
                api.get('course')
                    .then(response => {
                        this.courses = response.data.courses
                    })
            }
        }
    }
}
</script>
