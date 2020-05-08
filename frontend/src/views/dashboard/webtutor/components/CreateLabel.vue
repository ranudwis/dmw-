<template>
    <v-dialog v-model="dialog" max-width="400">
        <template #activator="{ on }">
            <div class="text-right">
                <v-btn v-on="on" fab color="primary">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </div>
        </template>

        <v-card>
            <v-card-title>Buat Label</v-card-title>

            <v-card-text>
                <v-text-field autofocus label="Label"></v-text-field>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn @click="dialog = false" text>batal</v-btn>
                <v-btn @click="dialog = false" text color="primary">buat</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    data() {
        return {
            dialog: false,
        }
    }
}
</script>
