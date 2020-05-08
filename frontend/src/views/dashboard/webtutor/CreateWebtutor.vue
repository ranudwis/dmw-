<template>
    <v-content>
        <v-container>
            <create-webtutor-toolbar></create-webtutor-toolbar>

            <webtutor-form></webtutor-form>
        </v-container>
    </v-content>
</template>

<script>
import CreateWebtutorToolbar from './components/CreateWebtutorToolbar'
import WebtutorForm from '@/templates/webtutor/WebtutorForm'

export default {
    components: {
        CreateWebtutorToolbar,
        WebtutorForm,
    }
}
</script>
