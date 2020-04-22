<template>
    <v-row>
        <v-col cols="4">
            <v-card>
                <v-list-item two-line link>
                    <v-list-item-action>
                        <v-icon>mdi-chevron-left</v-icon>
                    </v-list-item-action>

                    <v-list-item-content>
                        <v-list-item-title>{{ prev.title }}</v-list-item-title>
                        <v-list-item-subtitle>{{ prev.content }}</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>
            </v-card>
        </v-col>

        <v-spacer></v-spacer>

        <v-col cols="4">
            <v-card>
                <v-list-item two-line link>
                    <v-list-item-content class="text-right">
                        <v-list-item-title>{{ next.title }}</v-list-item-title>
                        <v-list-item-subtitle>{{ prev.content }}</v-list-item-subtitle>
                    </v-list-item-content>

                    <v-list-item-action class="ml-8">
                        <v-icon>mdi-chevron-right</v-icon>
                    </v-list-item-action>
                </v-list-item>
            </v-card>
        </v-col>
    </v-row>
</template>

<script>
export default {
    props: {
        prev: {
            type: Object,
            required: true
        },

        next: {
            type: Object,
            required: true
        }
    }
}
</script>
