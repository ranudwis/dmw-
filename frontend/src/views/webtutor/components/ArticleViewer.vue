<template>
    <v-container>
        <h1 class="display-1">{{ article.title }}</h1>

        <p class="subtitle-2">
            {{ article.posted_at }}
        </p>

        <p class="body-1">
            {{ article.content }}
        </p>
    </v-container>
</template>

<script>
export default {
    props: {
        article: {
            type: Object,
            required: true
        }
    }
}
</script>
