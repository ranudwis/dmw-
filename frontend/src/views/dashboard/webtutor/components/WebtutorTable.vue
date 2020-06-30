<template>
    <v-simple-table>
        <thead>
            <tr>
                <th>
                    Judul
                </th>
                <th>
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody>
            <tr
                v-for="article in articles"
                :key="article.id"
            >
                <td>
                    {{ article.title }}
                </td>
                <td>
                    <v-btn icon>
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>

                    <delete-webtutor-article
                        @deleted="update"
                        :webtutor="article"
                    ></delete-webtutor-article>
                </td>
            </tr>
        </tbody>
    </v-simple-table>
</template>

<script>
import api from '@/api'
import DeleteWebtutorArticle from './DeleteWebtutorArticle'

export default {
    components: {
        DeleteWebtutorArticle,
    },

    data() {
        return {
            articles: []
        }
    },

    methods: {
        update() {
            api.get('article', { loader: 'dashboard' })
                .then(response => {
                    this.articles = response.data.articles
                })
        }
    },

    created() {
        this.update()
    }
}
</script>
