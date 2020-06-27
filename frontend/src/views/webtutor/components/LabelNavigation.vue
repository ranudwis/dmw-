<template>
    <v-navigation-drawer
        @input="$emit('input', $event)"
        :value="value"
        :floating="floating"
        :permanent="permanent"
        :absolute="absolute"
        :width="width"
    >
        <v-list>
            <v-list-item>
                <v-list-item-avatar>
                    <v-icon>mdi-tag</v-icon>
                </v-list-item-avatar>

                <v-list-item-title>Label</v-list-item-title>
            </v-list-item>
            <v-skeleton-loader v-if="! labels" type="list-item@3"></v-skeleton-loader>

            <v-list-item
                v-else
                v-for="label in labels"
                :key="label.id"
                :to="{ name: 'webtutor.label', params: { label: label.slug } }"
            >
                <v-list-item-content>
                    <v-list-item-title>
                        {{ label.name }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
export default {
    props: {
        floating: {
            type: Boolean
        },
        permanent: {
            type: Boolean
        },
        absolute: {
            type: Boolean
        },
        value: {
            type: Boolean,
            default: true,
        },
        width: {
            type: String
        },
        labels: {
            type: Array,
        }
    },
}
</script>
