<template>
    <v-content>
        <v-container>
            <v-toolbar flat>
                <v-btn icon :to="{ name: 'semester.show', params: { slug: '1' } }">
                    <v-icon>mdi-arrow-left</v-icon>
                </v-btn>

                <v-toolbar-title>
                    Dasar Pemrograman
                    <span class="caption"> - AIK1234</span>
                </v-toolbar-title>

                <template #extension>
                    <v-tabs v-model="tab">
                        <v-tab>Soal &amp; Pembahasan</v-tab>
                        <v-tab>Modul</v-tab>
                    </v-tabs>
                </template>
            </v-toolbar>

            <v-tabs-items v-model="tab">
                <exam-tab-item class="pa-4"></exam-tab-item>

                <v-tab-item>
                    Ini adalah modul modul yang ada
                </v-tab-item>
            </v-tabs-items>
        </v-container>
    </v-content>
</template>

<script>
import ExamTabItem from './components/ExamTabItem'

export default {
    components: {
        ExamTabItem,
    },

    data() {
        return {
            tab: null
        }
    }
}
</script>
