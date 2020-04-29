<template>
    <v-container>
        <div class="d-flex align-center">
            <v-icon>mdi-web</v-icon>

            <h2 class="headline ml-2">
                Webtutor terbaru
            </h2>
        </div>

        <v-btn
            :to="{ name: 'webtutor.index' }"
            text
            small
            color="primary"
            class="ml-6"
        >
            Selengkapnya

            <v-icon right>mdi-chevron-right</v-icon>
        </v-btn>

        <webtutor-list :webtutors="webtutors" class="mt-4"></webtutor-list>
    </v-container>
</template>

<script>
import WebtutorList from '@/templates/webtutor/WebtutorList'

export default {
    components: {
        WebtutorList,
    },

    data() {
        return {
            webtutors: [
                {
                    id: 1,
                    slug: 'cara-membuat-sesuatu',
                    posted_at: new Date(),
                    title: 'Cara membuat sesuatu dengan sesuatu lain',
                    content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...'
                }
            ]
        }
    }
}
</script>
