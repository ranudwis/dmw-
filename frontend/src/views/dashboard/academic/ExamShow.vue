<template>
    <v-main>
        <v-container>
            <h1 class="title">Ujian tengah semester Agama 2019/2020</h1>

            <exam-information class="mt-4"></exam-information>

            <exam-question class="mt-8"></exam-question>

            <exam-answers class="mt-8"></exam-answers>
        </v-container>
    </v-main>
</template>

<script>
import ExamInformation from './components/ExamInformation'
import ExamQuestion from './components/ExamQuestion'
import ExamAnswers from './components/ExamAnswers'

export default {
    components: {
        ExamInformation,
        ExamQuestion,
        ExamAnswers,
    }
}
</script>
