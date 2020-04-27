<template>
    <v-menu>
        <template #activator="{ on }">
            <v-btn v-on="on" outlined color="primary">
                Tampilkan: {{ currentViewMode }}
            </v-btn>
        </template>

        <v-list>
            <v-list-item v-for="(viewMode, i) in viewModes" :key="i" @click="currentViewModeIdx = i">
                <v-list-item-content>
                    <v-list-item-title>{{ viewMode }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-menu>
</template>

<script>
export default {
    data() {
        return {
            currentViewModeIdx: 0,
            viewModes: [
                'Semua',
                'UTS',
                'UAS'
            ]
        }
    },

    computed: {
        currentViewMode() {
            return this.viewModes[this.currentViewModeIdx]
        }
    }
}
</script>
