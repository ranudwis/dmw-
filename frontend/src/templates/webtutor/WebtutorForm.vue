<template>
    <div>
        <v-text-field v-model="title" label="Judul"></v-text-field>

        <v-combobox
            v-model="selectedLabels"
            :items="labels"
            label="Label"
            multiple
            chips
            deletable-chips
            :loading="! labels"
        ></v-combobox>

        <tiptap-vuetify
            v-model="article"
            placeholder="Artikel webtutor..."
            :extensions="extensions"
        />
    </div>
</template>

<script>
import api from '@/api'
import { TiptapVuetify, Heading, Bold, Italic, Strike, Underline, Code, Paragraph, BulletList, OrderedList, ListItem, Link, Blockquote, HardBreak, HorizontalRule, History } from 'tiptap-vuetify'

export default {
    props: [ 'value' ],

    components: { TiptapVuetify },

    data() {
        return {
            labels: null,
            title: null,
            selectedLabels: null,
            article: null,

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
        }
    },

    watch: {
        title() {
            this.updateArticle()
        },

        selectedLabels() {
            this.updateArticle()
        },

        article() {
            this.updateArticle()
        },

        value() {
            this.updateOwnArticle()
        }
    },

    methods: {
        updateArticle() {
            this.$emit('input', {
                title: this.title,
                labels: this.selectedLabels,
                article: this.article
            })
        },

        updateOwnArticle() {
            this.title = this.value.title
            this.selectedLabels = this.value.labels
            this.article = this.value.article
        }
    },

    created() {
        this.updateOwnArticle()

        api.get('label')
            .then(response => {
                this.labels = response.data.labels.map(e => ({
                    value: e.id, text: e.name
                }))
            })
    }
}
</script>
