<template>
    <v-card link class="mb-4">
        <v-list-item two-line>
            <v-list-item-avatar color="primary">
                <v-icon color="white">
                    {{ icon }}
                </v-icon>
            </v-list-item-avatar>

            <v-list-item-content>
                <v-list-item-title>
                    {{ item.title }}
                </v-list-item-title>

                <v-list-item-subtitle>
                    {{ item.course }}
                </v-list-item-subtitle>
            </v-list-item-content>
        </v-list-item>
    </v-card>
</template>

<script>
export default {
    props: {
        icon: {
            type: String,
            required: true,
        },

        item: {
            type: Object,
            required: true,
        },
    }
}
</script>
