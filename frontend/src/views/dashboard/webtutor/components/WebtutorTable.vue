<template>
    <v-simple-table>
        <thead>
            <tr>
                <th>
                    Judul
                </th>
                <th>
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody>
            <tr
                v-for="webtutor in webtutors"
                :key="webtutor.id"
            >
                <td>
                    {{ webtutor.title }}
                </td>
                <td>
                    <v-btn icon>
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>

                    <v-btn icon color="red">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </td>
            </tr>
        </tbody>
    </v-simple-table>
</template>

<script>
export default {
    data() {
        return {
            webtutors: [
                {
                    id: 1,
                    title: 'Cara membuat sesuatu dengan sesuatu yang lain'
                }, {
                    id: 2,
                    title: 'Cara membuat sesuatu dengan sesuatu yang lain'
                }, {
                    id: 3,
                    title: 'Cara membuat sesuatu dengan sesuatu yang lain'
                }, {
                    id: 4,
                    title: 'Cara membuat sesuatu dengan sesuatu yang lain'
                }, {
                    id: 5,
                    title: 'Cara membuat sesuatu dengan sesuatu yang lain'
                }, {
                    id: 6,
                    title: 'Cara membuat sesuatu dengan sesuatu yang lain'
                }
            ]
        }
    }
}
</script>
