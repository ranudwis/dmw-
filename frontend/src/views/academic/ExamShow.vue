<template>
    <v-content>
        <v-container>
            <v-toolbar flat>
                <v-btn icon :to="{ name: 'course.show', params: { slug: $route.params.slug } }" exact>
                    <v-icon>mdi-arrow-left</v-icon>
                </v-btn>

                <v-toolbar-title>
                    UTS 2019/2020 Dasar Pemrograman
                    <span class="caption"> - AIK1234</span>
                </v-toolbar-title>
            </v-toolbar>

            <v-card href="https://google.com" target="_blank" class="mb-4">
                <v-list-item>
                    <v-list-item-avatar>
                        <v-icon>mdi-file</v-icon>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title>Soal</v-list-item-title>
                    </v-list-item-content>

                    <v-list-item-icon>
                        <v-icon>mdi-open-in-new</v-icon>
                    </v-list-item-icon>
                </v-list-item>
            </v-card>

            <v-card
                v-for="(answer, idx) in answers"
                :key="answer.id"
                :href="answer.url"
                target="_blank"
                class="my-2"
                :class="{ 'mb-8': idx === 0 }"
            >
                <v-list-item>
                    <v-list-item-avatar>
                        <v-icon>mdi-file</v-icon>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title>Jawaban</v-list-item-title>
                        <v-list-item-subtitle>Oleh {{ answer.user }}</v-list-item-subtitle>
                    </v-list-item-content>

                    <v-list-item-icon>
                        <v-icon>mdi-open-in-new</v-icon>
                    </v-list-item-icon>
                </v-list-item>
            </v-card>

            <add-answer></add-answer>

            <create-comment class="mt-4"></create-comment>

            <comment-list class="mt-4"></comment-list>
        </v-container>
    </v-content>
</template>

<script>
import CreateComment from '@/templates/comment/CreateComment'
import CommentList from '@/templates/comment/CommentList'
import AddAnswer from './components/AddAnswer'

export default {
    components: {
        CreateComment,
        CommentList,
        AddAnswer,
    },

    data() {
        return {
            answers: [
                {
                    id: 1,
                    url: 'https://google.com',
                    user: 'Admin'
                }, {
                    id: 2,
                    url: 'https://google.com',
                    user: 'Random user'
                }, {
                    id: 3,
                    url: 'https://google.com',
                    user: 'Another random user'
                }
            ]
        }
    }
}
</script>
