<template>
    <v-main>
        <v-container>
            <course-search-bar v-model="search" class="my-4"></course-search-bar>

            <course-list :search="search"></course-list>
        </v-container>
    </v-main>
</template>

<script>
import CourseSearchBar from './components/CourseSearchBar'
import CourseList from './components/CourseList'

export default {
    components: {
        CourseSearchBar,
        CourseList,
    },

    data() {
        return {
            search: null,
        }
    }
}
</script>
