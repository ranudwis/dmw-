<template>
    <v-main>
        <v-container>
            <create-label @created="updateList"></create-label>

            <label-list ref="list" class="mt-4"></label-list>
        </v-container>
    </v-main>
</template>

<script>
import CreateLabel from './components/CreateLabel'
import LabelList from './components/LabelList'

export default {
    components: {
        CreateLabel,
        LabelList,
    },

    methods: {
        updateList() {
            this.$refs.list.updateList()
        }
    }
}
</script>
