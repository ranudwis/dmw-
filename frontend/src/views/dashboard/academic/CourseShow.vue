<template>
    <v-main>
        <v-container>
            {{ course.title }}
            <v-tabs v-model="tab">
                <v-tab>Soal &amp; Pembahasan</v-tab>
                <v-tab>Modul</v-tab>
            </v-tabs>

            <v-tabs-items v-model="tab">
                <question-and-answer-tab></question-and-answer-tab>

                <v-tab-item></v-tab-item>
            </v-tabs-items>
        </v-container>
    </v-main>
</template>

<script>
import api from '@/api'
import QuestionAndAnswerTab from './components/QuestionAndAnswerTab'

export default {
    components: {
        QuestionAndAnswerTab
    },

    data() {
        return {
            tab: null,
            course: {},
        }
    },

    created() {
        api.get(`course/${this.$route.params.slug}`, { loader: 'dashboard' })
            .then(response => {
                this.course = response.data
            })
    }
}
</script>
