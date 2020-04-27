<template>
    <div>
        <v-card
            v-for="exam in exams"
            :key="exam.id"
            :to="{ name: 'exam.show', params: { slug: $route.params.slug, examId: exam.id } }"
            class="my-4"
        >
            <v-list-item>
                <v-list-item-avatar>
                    <v-icon v-if="exam.information">mdi-file-alert</v-icon>
                    <v-icon v-else-if="exam.isAvailable">mdi-file-check</v-icon>
                    <v-icon v-else>mdi-file</v-icon>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>
                        {{ exam.title }}
                    </v-list-item-title>

                    <v-list-item-subtitle v-if="exam.information">
                        {{ exam.information }}
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
    data() {
        return {
            exams: [
                {
                    id: 1,
                    title: 'UTS 2019/2020',
                    isAvailable: false,
                    information: 'Soal belum ada',
                    hasComment: false,
                }, {
                    id: 2,
                    title: 'UAS 2018/2019',
                    isAvailable: false,
                    information: 'Soal tidak diberikan ke mahasiswa',
                    hasComment: true,
                }, {
                    id: 3,
                    title: 'UTS 2018/2019',
                    isAvailable: true,
                    information: 'Jawaban belum ada',
                    hsaComment: false,
                }, {
                    id: 4,
                    title: 'UAS 2017/2018',
                    isAvailable: true,
                    hasComment: false,
                }, {
                    id: 5,
                    title: 'UTS 2017/2018',
                    isAvailable: true,
                    hasComment: false,
                }
            ]
        }
    },
}
</script>
