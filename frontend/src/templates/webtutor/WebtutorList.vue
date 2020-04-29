<template>
    <v-row>
        <v-col v-for="webtutor in webtutors" :key="webtutor.id" cols="12" sm="6" md="4" lg="3">
            <v-card :to="{ name: 'webtutor.show', params: { slug: webtutor.slug } }">
                <v-img src="@/assets/images/webtutorDefaultCover.jpg" max-height="200px" position="top"></v-img>
                <v-card-title>{{ webtutor.title }}</v-card-title>
                <v-card-subtitle>{{ webtutor.posted_at }}</v-card-subtitle>
                <v-card-text>
                    {{ webtutor.content }}
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>
</template>

<script>
export default {
    props: {
        webtutors: {
            type: Array,
            required: true
        }
    }
}
</script>
