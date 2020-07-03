<template>
    <v-tab-item>
        <exam-list
            :exams="exams"
            routeName="dashboard.academic.course.showexam"
            :slug="$route.params.slug"
        ></exam-list>
    </v-tab-item>
</template>

<script>
import api from '@/api'
import ExamList from '@/templates/academic/ExamList'

export default {
    components: {
        ExamList,
    },

    data() {
        return {
            exams: []
        }
    },

    created() {
        api.get(`course/${this.$route.params.slug}/exam`, { loader: 'dashboard' })
            .then(response => {
                this.exams = response.data.exams
            })
    }
}
</script>
