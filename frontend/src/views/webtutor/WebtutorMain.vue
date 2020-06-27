<template>
    <v-main>
        <navigation-bar
            v-if="$vuetify.breakpoint.smAndDown"
            v-model="navigationDrawer"
            :labels="labels"
        ></navigation-bar>

        <label-navigation
            v-if="$vuetify.breakpoint.smAndDown"
            v-model="navigationDrawer"
            :labels="labels"
            absolute
        ></label-navigation>

        <v-container fluid class="pa-md-8">
            <v-row>
                <v-col v-if="$vuetify.breakpoint.mdAndUp" md="3" lg="2">
                    <back-button class="mb-4"></back-button>

                    <v-card>
                        <label-navigation
                            :labels="labels"
                            floating
                            permanent
                            width="100%"
                        ></label-navigation>
                    </v-card>
                </v-col>

                <v-col cols="12" md="9" lg="10">
                    <router-view></router-view>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
import api from '@/api'
import NavigationBar from './components/NavigationBar'
import LabelNavigation from './components/LabelNavigation'
import BackButton from './components/BackButton'

export default {
    components: {
        NavigationBar,
        LabelNavigation,
        BackButton,
    },

    data() {
        return {
            navigationDrawer: false,
            labels: null,
        }
    },

    created() {
        api.get('label', { loader: 'label' })
            .then(response => {
                this.labels = response.data.labels
            })
    }
}
</script>
