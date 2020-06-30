<template>
    <div>
        <v-text-field v-model="title" label="Judul"></v-text-field>

        <v-file-input
            v-model="cover"
            label="Gambar cover"
            prepend-icon="mdi-image"
            accept="image/*"
        ></v-file-input>

        <v-autocomplete
            v-model="selectedLabels"
            :items="labels"
            label="Label"
            multiple
            chips
            deletable-chips
            :loading="! labels"
        ></v-autocomplete>

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
            cover: null,
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

        cover() {
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
                cover: this.cover,
                labels: this.selectedLabels,
                article: this.article
            })
        },

        updateOwnArticle() {
            this.title = this.value.title
            this.cover = this.value.cover
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
