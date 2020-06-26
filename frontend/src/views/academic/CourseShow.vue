<template>
    <v-main>
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

                <module-tab-item class="pa-4"></module-tab-item>
            </v-tabs-items>
        </v-container>
    </v-main>
</template>

<script>
import ExamTabItem from './components/ExamTabItem'
import ModuleTabItem from './components/ModuleTabItem'

export default {
    components: {
        ExamTabItem,
        ModuleTabItem,
    },

    data() {
        return {
            tab: null
        }
    },

    // Change to module tab when the route has the hash
    beforeRouteEnter(to, from, next) {
        next(vm => {
            if (to.hash === '#modul') {
                vm.tab = 1
            }
        })
    },

    beforeRouteUpdate(to, from, next) {
        if (to.hash === '#modul') {
            this.tab = 1
        }

        next()
    }
}
</script>
