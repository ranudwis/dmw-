<template>
    <v-text-field
        @input="$emit('input', $event)"
        autofocus
        append-icon="mdi-magnify"
        label="Cari mata kuliah"
    ></v-text-field>
</template>
