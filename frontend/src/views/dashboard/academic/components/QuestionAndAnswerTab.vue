<template>
    <v-tab-item>
        <create-exam @created="updateList"></create-exam>

        <exam-list
            :exams="exams"
            routeName="dashboard.academic.course.showexam"
            :slug="$route.params.slug"
        ></exam-list>
    </v-tab-item>
</template>

<script>
import api from '@/api'
import CreateExam from '@/templates/dashboard/exam/CreateExam'
import ExamList from '@/templates/academic/ExamList'

export default {
    components: {
        CreateExam,
        ExamList,
    },

    data() {
        return {
            exams: []
        }
    },

    methods: {
        updateList() {
            api.get(`courseexam/${this.$route.params.slug}`, { loader: 'dashboard' })
                .then(response => {
                    this.exams = response.data.exams
                })
        }
    },

    created() {
        this.updateList()
    }
}
</script>
