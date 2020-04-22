<template>
    <v-container>
        <h1 class="display-1">{{ title }}</h1>
        <p class="subtitle">
            {{ posted_at }}
        </p>
        <p>
            {{ content }}
        </p>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            title: 'Test article',
            content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            posted_at: new Date(),
        }
    }
}
</script>
