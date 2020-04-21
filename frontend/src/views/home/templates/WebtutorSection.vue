<template>
    <v-container>
        <h2 class="headline">
            <v-icon>mdi-web</v-icon>
            Webtutor terbaru

            <v-btn text small color="primary" class="ml-4">
                Selengkapnya

                <v-icon right>mdi-chevron-right</v-icon>
            </v-btn>
        </h2>

        <v-row class="mt-4">
            <v-col v-for="webtutor in webtutors" :key="webtutor.id" cols="3">
                <v-card link>
                    <v-img src="@/assets/images/cover.jpg" max-height="200px" position="top"></v-img>
                    <v-card-title>{{ webtutor.title }}</v-card-title>
                    <v-card-subtitle>{{ webtutor.posted_at }}</v-card-subtitle>
                    <v-card-text>
                        {{ webtutor.content }}
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
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
