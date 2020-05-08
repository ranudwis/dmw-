<template>
    <div>
        <v-card
            v-for="label in labels"
            :key="label.id"
            class="mb-4"
        >
            <v-list-item>
                <v-list-item-avatar>
                    <v-icon>mdi-tag</v-icon>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>
                        {{ label.name }}
                    </v-list-item-title>
                </v-list-item-content>

                <v-list-item-icon>
                    <v-btn icon>
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>

                    <v-btn icon color="red">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </v-list-item-icon>
            </v-list-item>
        </v-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            labels: [
                {
                    id: 1,
                    name: 'PHP'
                }, {
                    id: 2,
                    name: 'Javascript'
                }, {
                    id: 3,
                    name: 'OOT'
                }
            ]
        }
    }
}
</script>
