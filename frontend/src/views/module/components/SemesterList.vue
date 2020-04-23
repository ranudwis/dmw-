<template>
    <div>
        <v-card v-for="semester in semesters" :key="semester.id" class="my-2" link>
            <v-list-item>
                <v-list-item-avatar color="primary">
                    <v-icon color="white">mdi-book-multiple</v-icon>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title>
                        {{ semester.title }}
                    </v-list-item-title>
                </v-list-item-content>

                <v-list-item-icon>
                    <v-icon>mdi-chevron-right</v-icon>
                </v-list-item-icon>
            </v-list-item>
        </v-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            semesters: [
                {
                    id: 1,
                    slug: '1',
                    title: 'Semester 1'
                }, {
                    id: 2,
                    slug: '2',
                    title: 'Semester 2'
                }, {
                    id: 3,
                    slug: '3',
                    title: 'Semester 3'
                }, {
                    id: 4,
                    slug: '4',
                    title: 'Semester 4'
                }, {
                    id: 5,
                    slug: '5',
                    title: 'Semester 5'
                }, {
                    id: 6,
                    slug: '6',
                    title: 'Semester 6'
                }, {
                    id: 7,
                    slug: '7',
                    title: 'Semester 7'
                }, {
                    id: 8,
                    slug: '8',
                    title: 'Semester 7'
                }, {
                    id: 9,
                    slug: 'pilihanganjil',
                    title: 'Pilihan Semester Ganjil'
                }, {
                    id: 10,
                    slug: 'pilihangenap',
                    title: 'Pilihan Semester Genap'
                }
            ]
        }
    }
}
</script>
