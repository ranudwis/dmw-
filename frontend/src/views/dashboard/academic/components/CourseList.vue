<template>
    <div v-if="semesters">
        <div
            v-for="semester in semestersFiltered"
            :key="semester.id"
            class="mt-4"
        >
            <h3 class="title">{{ semester.title }}</h3>

            <v-card
                v-for="course in semester.courses"
                :key="course.id"
                :to="{ name: 'dashboard.academic.course.show', params: {slug: course.slug } }"
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

export default {
    props: {
        search: {
            type: String
        }
    },

    data() {
        return {
            semesters: null,
        }
    },

    computed: {
        semestersFiltered() {
            return this.semesters
                .map(semester => {
                    return {
                        ...semester,
                        courses: semester.courses.filter(course => {
                            return ! this.search ? true : (
                                course.title.toLowerCase().includes(this.search.toLowerCase())
                                || course.slug.includes(this.search.toLowerCase())
                            )
                        })
                    }
                })
                .filter(semester => semester.courses.length > 0)
        }
    },

    created() {
        api.get('semester/withCourses', { loader: 'dashboard' })
            .then(response => {
                this.semesters = response.data.semesters
            })
    }
}
</script>
