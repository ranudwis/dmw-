<template>
    <v-dialog :value="value" @input="$emit('input', $event)" max-width="400px">
        <template #activator="{ on }">
            <slot :on="on" name="activator">
                No Activator
            </slot>
        </template>

        <v-card>
            <v-card-title>{{ title }}</v-card-title>
            <v-card-subtitle v-if="subtitle">{{ subtitle }}</v-card-subtitle>

            <v-card-text>
                <slot></slot>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn @click="$emit('input', false)" text>{{ cancelButton }}</v-btn>

                <v-btn
                    @click="$emit('ok')"
                    text
                    :color="color"
                    :loading="isLoading(loading)"
                >
                    {{ okButton }}
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import { isLoading } from '@/dmw/loader'

export default {
    props: {
        value: {
            required: true
        },

        title: {
            type: String,
            required: true,
        },

        subtitle: {
            type: String,
        },

        cancelButton: {
            type: String,
            default: 'batal'
        },

        color: {
            type: String,
            default: 'primary'
        },

        okButton: {
            type: String,
            default: 'ok'
        },

        loading: {
            type: String,
            default: 'noLoader',
        }
    },

    methods: {
        isLoading
    }
}
</script>
