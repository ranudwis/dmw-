<template>
    <v-main>
        <v-container>
            <create-webtutor-toolbar @publish="publish"></create-webtutor-toolbar>

            <webtutor-by-other-user-choice v-model="volunteer"></webtutor-by-other-user-choice>

            <webtutor-form v-model="article"></webtutor-form>
        </v-container>
    </v-main>
</template>

<script>
import api from '@/api'
import alert from '@/dmw/alert'
import CreateWebtutorToolbar from './components/CreateWebtutorToolbar'
import WebtutorByOtherUserChoice from './components/WebtutorByOtherUserChoice'
import WebtutorForm from '@/templates/webtutor/WebtutorForm'

export default {
    components: {
        CreateWebtutorToolbar,
        WebtutorByOtherUserChoice,
        WebtutorForm,
    },

    data() {
        return {
            volunteer: null,
            article: {
                title: null,
                cover: null,
                labels: [],
                article: null,
            },
        }
    },

    methods: {
        publish() {
            const data = new FormData()
            data.append('volunteer', this.volunteer)
            data.append('title', this.article.title)
            data.append('cover', this.article.cover)
            data.append('article', this.article.article)
            this.article.labels.forEach(e => data.append('labels[]', e))

            api.post('article', data, {
                loader: 'publish',
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    if (response.data.created) {
                        alert.success('webtutor.created')
                        this.$router.push({ name: 'dashboard.webtutor.index' })

                        this.volunteer = null
                        this.article = {
                            title: null,
                            cover: null,
                            labels: [],
                            article: null,
                        }
                    }
                })
        }
    }
}
</script>
