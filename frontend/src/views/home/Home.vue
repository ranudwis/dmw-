<template>
    <v-content>
        <jumbotron-section class="mb-4"></jumbotron-section>

        <webtutor-section class="my-4"></webtutor-section>

        <modules-section class="my-4"></modules-section>

        <footer-section class="mt-8"></footer-section>
    </v-content>
</template>

<script>
import JumbotronSection from './components/JumbotronSection'
import WebtutorSection from './components/WebtutorSection'
import ModulesSection from './components/ModulesSection'
import FooterSection from './components/FooterSection'

export default {
    components: {
        JumbotronSection,
        WebtutorSection,
        ModulesSection,
        FooterSection,
    }
}
</script>
