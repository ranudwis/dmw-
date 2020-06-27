<template>
    <v-app-bar flat>
        <v-btn
            v-if="$route.name === 'webtutor.index'"
            @click="$emit('input', ! value)"
            icon
        >
            <v-icon>mdi-tag</v-icon>
        </v-btn>

        <v-btn
            v-else
            @click="$router.push({ name: 'webtutor.index' })"
            icon
        >
            <v-icon>mdi-arrow-left</v-icon>
        </v-btn>

        <v-toolbar-title v-if="$route.name === 'webtutor.label'">
            {{ label }}
        </v-toolbar-title>

        <v-toolbar-title v-else>Webtutor</v-toolbar-title>
    </v-app-bar>
</template>

<script>
export default {
    props: {
        value: {
            type: Boolean,
            required: true,
        },

        labels: {
            type: Array,
        }
    },

    computed: {
        label() {
            return this.labels.find(e => e.slug === this.$route.params.label).name
        }
    }
}
</script>
