<template>
    <v-main>
        <v-container>
            <create-webtutor-toolbar></create-webtutor-toolbar>

            <webtutor-by-other-user-choice></webtutor-by-other-user-choice>

            <webtutor-form></webtutor-form>
        </v-container>
    </v-main>
</template>

<script>
import CreateWebtutorToolbar from './components/CreateWebtutorToolbar'
import WebtutorByOtherUserChoice from './components/WebtutorByOtherUserChoice'
import WebtutorForm from '@/templates/webtutor/WebtutorForm'

export default {
    components: {
        CreateWebtutorToolbar,
        WebtutorByOtherUserChoice,
        WebtutorForm,
    }
}
</script>
