<template>
    <div>
        <v-text-field label="Judul"></v-text-field>

        <v-combobox
            :items="labels"
            label="Label"
            multiple
            chips
            deletable-chips
        ></v-combobox>

        <tiptap-vuetify
            placeholder="Artikel webtutor..."
            :extensions="extensions"
        />
    </div>
</template>

<script>
import { TiptapVuetify, Heading, Bold, Italic, Strike, Underline, Code, Paragraph, BulletList, OrderedList, ListItem, Link, Blockquote, HardBreak, HorizontalRule, History } from 'tiptap-vuetify'

export default {
    components: { TiptapVuetify },

    data: () => ({
        labels: [
            'PHP', 'Javascript', 'Python'
        ],

        extensions: [
            History,
            Blockquote,
            Link,
            Underline,
            Strike,
            Italic,
            ListItem,
            BulletList,
            OrderedList,
            [Heading, {
                options: {
                    levels: [1, 2, 3]
                }
            }],
            Bold,
            Code,
            HorizontalRule,
            Paragraph,
            HardBreak
        ],
    })
}
</script>
