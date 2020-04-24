<template>
    <v-tab-item>
        <questions-and-answers-view-selector></questions-and-answers-view-selector>

        <questions-and-answers-list class="mt-4"></questions-and-answers-list>
    </v-tab-item>
</template>

<script>
import QuestionsAndAnswersViewSelector from './QuestionsAndAnswersViewSelector'
import QuestionsAndAnswersList from './QuestionsAndAnswersList'

export default {
    components: {
        QuestionsAndAnswersViewSelector,
        QuestionsAndAnswersList,
    }
}
</script>
