<template>
    <v-container>
        <h2 class="headline">
            <v-icon>mdi-book-open-page-variant</v-icon>
            Modul dan pembahasan terbaru

            <v-btn text small color="primary" class="ml-4">
                Selengkapnya

                <v-icon right>mdi-chevron-right</v-icon>
            </v-btn>
        </h2>

        <v-row class="mt-4">
            <v-col cols="6">
                <module-item
                    v-for="module in modules"
                    :key="module.id"
                    icon="mdi-book"
                    :item="module"
                ></module-item>
            </v-col>

            <v-divider vertical></v-divider>

            <v-col>
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
                    course: 'Algoritma Pemrograman'
                }
            ],

            answers: [
                {
                    id: 1,
                    title: 'Pembahasan UTS 2019/2020',
                    course: 'Algoritma Pemrograman',
                }
            ]
        }
    }
}
</script>
