<template>
    <v-card>
        <v-card-title>
            Soal

            <v-spacer></v-spacer>

            <put-question :exam="exam"></put-question>
        </v-card-title>

        <v-list>
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title v-if="exam.questionPath">Soal</v-list-item-title>
                    <v-list-item-title v-else>Belum ada soal</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-card>
</template>

<script>
import PutQuestion from './PutQuestion'

export default {
    props: {
        exam: {
            type: Object,
        }
    },

    components: {
        PutQuestion,
    }
}
</script>
