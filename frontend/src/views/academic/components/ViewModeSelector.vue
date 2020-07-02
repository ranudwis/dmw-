<template>
    <v-menu>
        <template #activator="{ on }">
            <v-btn v-on="on" outlined color="primary">
                <v-icon left>{{ currentViewMode.icon }}</v-icon>
                Tampilkan: {{ currentViewMode.title }}
            </v-btn>
        </template>

        <v-list>
            <v-list-item
                v-for="(viewMode, idx) in viewModes"
                :key="idx"
                @click="selectViewModeIdx(idx)"
            >
                <v-list-item-icon>
                    <v-icon>{{ viewMode.icon }}</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>{{ viewMode.title }}</v-list-item-title>
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
                {
                    icon: 'mdi-view-agenda',
                    slug: 'semester',
                    title: 'Semester'
                }, {
                    icon: 'mdi-view-list',
                    slug: 'course',
                    title: 'Semua'
                }
            ]
        }
    },

    computed: {
        currentViewMode() {
            return this.viewModes[this.currentViewModeIdx]
        }
    },

    methods: {
        selectViewModeIdx(idx) {
            this.currentViewModeIdx = idx

            this.$emit('input', this.viewModes[idx].slug)
        }
    }
}
</script>
