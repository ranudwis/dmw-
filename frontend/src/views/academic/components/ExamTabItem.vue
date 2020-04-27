<template>
    <v-tab-item>
        <exam-view-selector></exam-view-selector>

        <exam-downloader class="ml-4"></exam-downloader>

        <exam-list class="mt-4"></exam-list>
    </v-tab-item>
</template>

<script>
import ExamViewSelector from './ExamViewSelector'
import ExamDownloader from './ExamDownloader'
import ExamList from './ExamList'

export default {
    components: {
        ExamViewSelector,
        ExamDownloader,
        ExamList,
    }
}
</script>
