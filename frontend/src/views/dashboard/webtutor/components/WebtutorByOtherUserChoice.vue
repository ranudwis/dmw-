<template>
    <div>
        <v-checkbox v-model="otherUser" @click="updateVolunteer" label="Oleh pengguna lain"></v-checkbox>

        <v-text-field
            v-if="otherUser"
            :value="value"
            @input="$emit('input', $event)"
            ref="nameInput"
            label="Nama pengguna"
        ></v-text-field>
    </div>
</template>

<script>
export default {
    props: [ 'value' ],

    data() {
        return {
            otherUser: false,
        }
    },

    methods: {
        updateVolunteer() {
            if (this.otherUser) {
                this.$refs.nameInput.focus()
            } else {
                this.$emit('input', null)
            }
        },
    }
}
</script>
