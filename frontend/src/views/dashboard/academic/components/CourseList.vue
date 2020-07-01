<template>
    <div v-if="courses">
        <div
            v-for="(courses, semester) in semesters"
            :key="semester"
            class="mt-4"
        >
            <h3 class="title">{{ semester }}</h3>

            <v-card
                v-for="course in courses"
                :key="course.id"
                link
                class="my-2"
            >
                <v-list-item two-line>
                    <v-list-item-content>
                        <v-list-item-title>
                            {{ course.title }}
                        </v-list-item-title>
                        <v-list-item-subtitle>
                            {{ course.code }}
                        </v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>
            </v-card>
        </div>
    </div>
</template>

<script>
import api from '@/api'
import { groupBy } from 'lodash'

export default {
    props: {
        search: {
            type: String
        }
    },

    data() {
        return {
            courses: null,
        }
    },

    computed: {
        semesters() {
            const searched = this.courses.filter(course => {
                return ! this.search ? true : (
                        course.title.toLowerCase().includes(this.search.toLowerCase())
                        || course.slug.includes(this.search.toLowerCase())
                    )
            })

            return groupBy(searched, 'semester')
        }
    },

    created() {
        api.get('course', { loader: 'dashboard' })
            .then(response => {
                this.courses = response.data.courses
            })
    }
}
</script>
