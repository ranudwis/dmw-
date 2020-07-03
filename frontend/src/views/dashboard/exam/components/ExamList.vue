<template>
    <div>
        <v-card
            v-for="(exam, idx) in exams"
            :key="exam.id"
            class="my-2"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-title>
                        {{ title(idx) }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-card>
    </div>
</template>

<script>
import api from '@/api'

export default {
    data() {
        return {
            exams: null,
        }
    },

    computed: {
        title() {
            return function (idx) {
                const type = this.exams[idx].type === 'mid' ? 'Ujian Tengah Semester' : 'Ujian Akhir Semester'
                const semester = this.exams[idx].semester === 'even' ? 'Genap' : 'Ganjil'
                const schoolYear = `${this.exams[idx].start_year}/${this.exams[idx].end_year}`

                return `${type} ${semester} ${schoolYear}`
            }
        }
    },

    methods: {
        update() {
            api.get('exam', { loader: 'dashboard' })
                .then(response => {
                    this.exams = response.data.exams
                })
        }
    },

    created() {
        this.update()
    }
}
</script>
