<template>
    <div>
        <v-card
            v-for="label in labels"
            :key="label.id"
            class="mb-4"
        >
            <v-list-item two-line>
                <v-list-item-avatar>
                    <v-icon>mdi-tag</v-icon>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>
                        {{ label.name }}
                    </v-list-item-title>

                    <v-list-item-subtitle>
                        {{ label.slug }}
                    </v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-action>
                    <div>
                        <edit-label @edited="updateList" :label="label"></edit-label>

                        <delete-label @deleted="updateList" :label="label"></delete-label>
                    </div>
                </v-list-item-action>
            </v-list-item>
        </v-card>
    </div>
</template>

<script>
import api from '@/api'
import DeleteLabel from './DeleteLabel'
import EditLabel from './EditLabel'

export default {
    components: {
        EditLabel,
        DeleteLabel,
    },

    data() {
        return {
            labels: []
        }
    },

    methods: {
        updateList() {
            api.get('label', { loader: 'dashboard' })
                .then(response => {
                    this.labels = response.data.labels
                })
        }
    },

    created() {
        this.updateList()
    }
}
</script>
