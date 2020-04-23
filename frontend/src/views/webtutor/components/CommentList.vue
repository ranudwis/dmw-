<template>
    <div>
        <v-list three-line>
            <template v-for="comment in comments">
                <comment-item :key="comment.id" :comment="comment" withReplyButton></comment-item>

                <v-list
                    v-if="comment.replies.length !== 0"
                    :key="comment.id + 'r'"
                    class="pl-12 pr-4 py-0"
                >
                    <template v-for="reply in comment.replies">
                        <comment-item :key="reply.id" :comment="reply"></comment-item>
                    </template>
                </v-list>
            </template>
        </v-list>
    </div>
</template>

<script>
import CommentItem from './CommentItem'

export default {
    components: {
        CommentItem,
    },

    data() {
        return {
            comments: [
                {
                    id: 1,
                    user: 'Random user',
                    isUserAdmin: false,
                    commented_at: new Date(),
                    comment: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    replies: [
                        {
                            id: 2,
                            user: 'Admin',
                            isUserAdmin: true,
                            commented_at: new Date(),
                            comment: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                        }, {
                            id: 3,
                            user: 'Random user',
                            isUserAdmin: false,
                            commented_at: new Date(),
                            comment: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                        }
                    ]
                }, {
                    id: 4,
                    user: 'Another random user',
                    isUserAdmin: false,
                    commented_at: new Date(),
                    comment: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    replies: []
                }, {
                    id: 5,
                    user: 'Another random user',
                    isUserAdmin: false,
                    commented_at: new Date(),
                    comment: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    replies: []
                }
            ]
        }
    }
}
</script>
