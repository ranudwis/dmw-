<template>
    <div>
        <div v-if="isNotFound">
            Tidak dapat ditemukan
        </div>

        <slot v-else></slot>
    </div>
</template>

<script>
export default {
    props: {
        handler: {
            type: String,
            required: true,
        }
    },

    computed: {
        isNotFound() {
            return this.$store.get('notfound/handling', this.handler)
        }
    }
}
</script>
