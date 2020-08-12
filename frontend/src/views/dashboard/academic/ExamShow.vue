<template>
    <v-main>
        <v-container>
            <h1 class="title">Ujian tengah semester Agama 2019/2020</h1>

            <template v-if="exam">
                <exam-information v-model="exam" class="mt-4"></exam-information>

                <exam-question class="mt-8" :exam="exam"></exam-question>

                <exam-answers class="mt-8" :exam="exam"></exam-answers>
            </template>
        </v-container>
    </v-main>
</template>

<script>
import api from '@/api'
import ExamInformation from './components/ExamInformation'
import ExamQuestion from './components/ExamQuestion'
import ExamAnswers from './components/ExamAnswers'

export default {
    components: {
        ExamInformation,
        ExamQuestion,
        ExamAnswers,
    },

    data() {
        return {
            course: null,
            exam: null,
        }
    },

    created() {
        api.get(`course/${this.$route.params.slug}`, { loader: 'dashboard' })
            .then(response => {
                this.course = response.data
            })

        api.get(`courseexam/${this.$route.params.slug}/${this.$route.params.examId}`, { loader: 'dashboard' })
            .then(response => {
                this.exam = response.data ? response.data : {}
            })
    }
}
</script>
