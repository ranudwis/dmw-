<template>
    <div>
        <v-card
            v-for="exam in examsData"
            :key="exam.id"
            :to="{ name: routeName, params: { slug: slug, examId: exam.id } }"
            class="my-4"
        >
            <v-list-item>
                <v-list-item-avatar>
                    <v-icon>mdi-file</v-icon>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>
                        {{ exam.title }}
                    </v-list-item-title>

                    <v-list-item-subtitle>
                        <template v-if="exam.information">
                            {{ exam.information }}
                        </template>

                        <template v-else-if="! exam.question">
                            Belum ada soal
                        </template>
                    </v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-icon>
                    <v-icon v-if="exam.hasComment">mdi-forum</v-icon>

                    <v-btn
                        v-if="exam.isAvailable"
                        @click.stop=""
                        href="https://google.com"
                        target="_blank"
                        icon
                        class="ml-2"
                    >
                        <v-icon>mdi-download</v-icon>
                    </v-btn>

                    <v-icon class="ml-2">mdi-chevron-right</v-icon>
                </v-list-item-icon>
            </v-list-item>
        </v-card>
    </div>
</template>

<script>
export default {
    props: {
        exams: {
            type: Array,
        },

        routeName: {
            type: String
        },

        slug: {
            type: String
        },
    },

    computed: {
        examsData() {
            return this.exams.map(exam => {
                const type = exam.type === 'mid' ? 'Ujian Tengah Semester' : 'Ujian Akhir Semester'
                const schoolYear = `${exam.start_year}/${exam.end_year}`

                return {
                    id: exam.id,
                    title: `${type} ${schoolYear}`,
                    information: exam.information,
                    question: exam.question,
                }
            })
        }
    }
}
</script>
