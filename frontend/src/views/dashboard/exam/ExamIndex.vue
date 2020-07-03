<template>
    <v-main>
        <v-container>
            <create-exam @created="updateList"></create-exam>

            <exam-list ref="list"></exam-list>
        </v-container>
    </v-main>
</template>

<script>
import CreateExam from './components/CreateExam'
import ExamList from './components/ExamList'

export default {
    components: {
        CreateExam,
        ExamList,
    },

    methods: {
        updateList() {
            this.$refs.list.update()
        }
    }
}
</script>
