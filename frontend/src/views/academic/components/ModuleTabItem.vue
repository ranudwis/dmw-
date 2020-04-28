<template>
    <v-tab-item>
        <add-module></add-module>

        <module-list class="mt-8"></module-list>
    </v-tab-item>
</template>

<script>
import AddModule from './AddModule'
import ModuleList from './ModuleList'

export default {
    components: {
        AddModule,
        ModuleList
    }
}
</script>
