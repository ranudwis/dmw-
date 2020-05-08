<template>
    <div>
        <v-checkbox v-model="otherUser" label="Oleh pengguna lain"></v-checkbox>

        <v-text-field v-if="otherUser" label="Nama pengguna"></v-text-field>
    </div>
</template>

<script>
export default {
    data() {
        return {
            otherUser: false,
        }
    }
}
</script>
