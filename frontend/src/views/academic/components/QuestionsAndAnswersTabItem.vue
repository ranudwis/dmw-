<template>
    <v-tab-item>
        <questions-and-answers-view-selector></questions-and-answers-view-selector>

        <questions-and-answers-downloader class="ml-4"></questions-and-answers-downloader>

        <questions-and-answers-list class="mt-4"></questions-and-answers-list>
    </v-tab-item>
</template>

<script>
import QuestionsAndAnswersViewSelector from './QuestionsAndAnswersViewSelector'
import QuestionsAndAnswersDownloader from './QuestionsAndAnswersDownloader'
import QuestionsAndAnswersList from './QuestionsAndAnswersList'

export default {
    components: {
        QuestionsAndAnswersViewSelector,
        QuestionsAndAnswersDownloader,
        QuestionsAndAnswersList,
    }
}
</script>
