<template>
    <v-container>
        <h2 class="headline">
            <v-icon>mdi-web</v-icon>
            Webtutor terbaru

            <v-btn
                :to="{ name: 'webtutor.index' }"
                text
                small
                color="primary"
                class="ml-4"
            >
                Selengkapnya

                <v-icon right>mdi-chevron-right</v-icon>
            </v-btn>
        </h2>

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
