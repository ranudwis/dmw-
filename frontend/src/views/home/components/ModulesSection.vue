<template>
    <v-container>
        <div class="d-flex align-center">
            <v-icon>mdi-book-open-page-variant</v-icon>

            <h2 class="headline ml-2">
                Modul dan pembahasan terbaru
            </h2>
        </div>

        <v-btn
            :to="{ name: 'academic.index' }"
            text
            small
            color="primary"
            class="ml-6"
        >
            Selengkapnya

            <v-icon right>mdi-chevron-right</v-icon>
        </v-btn>

        <v-row class="mt-4">
            <v-col cols="12" md="6">
                <module-item
                    v-for="module in modules"
                    :key="module.id"
                    icon="mdi-book"
                    :item="module"
                ></module-item>
            </v-col>

            <v-col cols="12" md="6">
                <module-item
                    v-for="answer in answers"
                    :key="answer.id"
                    icon="mdi-file-document-edit"
                    :item="answer"
                ></module-item>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import ModuleItem from './ModuleItem'

export default {
    components: {
        ModuleItem,
    },

    data() {
        return {
            modules: [
                {
                    id: 1,
                    title: 'Bahasa pemrograman proseduran',
                    course: 'Algoritma Pemrograman',
                    course_slug: 'alpro'
                }
            ],

            answers: [
                {
                    id: 1,
                    title: 'Pembahasan UTS 2019/2020',
                    course: 'Algoritma Pemrograman',
                    course_slug: 'alpro'
                }
            ]
        }
    }
}
</script>
