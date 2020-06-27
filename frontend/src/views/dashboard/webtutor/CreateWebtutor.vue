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
                labels: [],
                article: null,
            },
        }
    },

    methods: {
        publish() {
            api.post('article', {
                volunteer: this.volunteer,
                title: this.article.title,
                labels: this.article.labels.map(e => e.value),
                article: this.article.article,
            }, { loader: 'publish' })
                .then(response => {
                    if (response.data.created) {
                        alert.success('webtutor.created')
                        this.$router.push({ name: 'dashboard.webtutor.index' })

                        this.volunteer = null
                        this.article = {
                            title: null,
                            labels: [],
                            article: null,
                        }
                    }
                })
        }
    }
}
</script>
