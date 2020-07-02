<template>
    <v-main>
        <v-container>
            <not-found-handler handler="semester">
                <v-toolbar flat>
                    <v-btn icon :to="{ name: 'academic.index' }" exact>
                        <v-icon>mdi-arrow-left</v-icon>
                    </v-btn>

                    <v-toolbar-title>
                        {{ semester.title }}
                    </v-toolbar-title>
                </v-toolbar>

                <course-list :courses="semester.courses" class="mt-4"></course-list>
            </not-found-handler>
        </v-container>
    </v-main>
</template>

<script>
import api from '@/api'
import NotFoundHandler from '@/templates/http/NotFoundHandler'
import CourseList from './components/CourseList'

export default {
    components: {
        NotFoundHandler,
        CourseList,
    },

    data() {
        return {
            semester: {}
        }
    },

    created() {
        api.get(`semester/${this.$route.params.slug}`, {
            loader: 'dashboard',
            notFoundHandler: 'semester'
        })
            .then(response => {
                this.semester = response.data
            })
    }
}
</script>
