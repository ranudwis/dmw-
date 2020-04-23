<template>
    <v-container>
        <article-viewer :article="webtutor"></article-viewer>

        <article-prev-and-next :prev="prev" :next="next" class="mt-4"></article-prev-and-next>

        <create-comment class="mt-4"></create-comment>

        <comment-list class="mt-4"></comment-list>
    </v-container>
</template>

<script>
import ArticleViewer from './components/ArticleViewer'
import ArticlePrevAndNext from './components/ArticlePrevAndNext'
import CreateComment from './components/CreateComment'
import CommentList from './components/CommentList'

export default {
    components: {
        ArticleViewer,
        ArticlePrevAndNext,
        CreateComment,
        CommentList,
    },

    data() {
        return {
            webtutor: {
                title: 'Test article',
                content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                posted_at: new Date(),
            },

            prev: {
                title: 'Test article',
                content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                posted_at: new Date(),
            },

            next: {
                title: 'Test article',
                content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                posted_at: new Date(),
            }
        }
    }
}
</script>
