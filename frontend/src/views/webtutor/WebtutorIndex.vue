<template>
    <v-container>
        <webtutor-list :webtutors="webtutors"></webtutor-list>

        <v-pagination v-model="page" :length="5" color="secondary" class="mt-4"></v-pagination>
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
            page: 1,

            webtutors: [
                {
                    id: 1,
                    slug: 'cara-membuat-sesuatu',
                    posted_at: new Date(),
                    title: 'Cara membuat sesuatu dengan sesuatu lain',
                    content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...'
                }, {
                    id: 2,
                    slug: 'cara-membuat-sesuatu',
                    posted_at: new Date(),
                    title: 'Cara membuat sesuatu dengan sesuatu lain',
                    content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...'
                }, {
                    id: 3,
                    slug: 'cara-membuat-sesuatu',
                    posted_at: new Date(),
                    title: 'Cara membuat sesuatu dengan sesuatu lain',
                    content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...'
                }, {
                    id: 4,
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
