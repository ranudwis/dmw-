<template>
    <v-list-item>
        <v-list-item-avatar color="blue-grey">
            <v-icon v-if="comment.isUserAdmin" color="white">
                mdi-account-cog
            </v-icon>

            <v-icon v-else color="white">
                mdi-account
            </v-icon>
        </v-list-item-avatar>

        <v-list-item-content>
            <v-list-item-title>
                {{ comment.user }}
                <span class="caption"> - {{ comment.commented_at }}</span>
            </v-list-item-title>

            <v-list-item-subtitle>
                {{ comment.comment }}
            </v-list-item-subtitle>

            <v-list-item-action-text v-if="withReplyButton" class="mt-2">
                <template v-if="replying">
                    <v-btn @click="replying = false" small text color="primary">batal</v-btn>

                    <create-comment></create-comment>
                </template>

                <template v-else>
                    <v-btn @click="replying = true" small text color="primary">balas</v-btn>
                </template>
            </v-list-item-action-text>
        </v-list-item-content>
    </v-list-item>
</template>

<script>
import CreateComment from './CreateComment'

export default {
    components: {
        CreateComment,
    },

    props: {
        comment: {
            type: Object,
            required: true,
        },

        withReplyButton: Boolean,
    },

    data() {
        return {
            replying: false,
        }
    }
}
</script>
