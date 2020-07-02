<template>
    <small-dialog
        v-model="dialog"
        @ok="create"
        title="Buat ujian"
        okButton="buat"
        loading="exam"
    >
        <template #activator="{ on }">
            <div class="text-right">
                <v-btn v-on="on" fab color="primary">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </div>
        </template>

        <v-overflow-btn
            v-model="type"
            :items="types"
            label="Tipe ujian"
        ></v-overflow-btn>

        <v-overflow-btn
            v-model="semester"
            :items="semesters"
            label="Semester"
        ></v-overflow-btn>

        <v-overflow-btn
            v-model="schoolYear"
            :items="schoolYears"
            label="Tahun ajaran"
        >
        </v-overflow-btn>
    </small-dialog>
</template>

<script>
import moment from 'moment'
import SmallDialog from '@/templates/dialog/SmallDialog'

export default {
    components: {
        SmallDialog,
    },

    data() {
        return {
            dialog: false,
            types: [
                { text: 'Tengah semester', value: 'mid' },
                { text: 'Akhir semester', value: 'end' },
            ],
            semesters: [
                { text: 'Semester Genap', value: 'even' },
                { text: 'Semester Ganjil', value: 'odd' },
            ],

            type: null,
            semester: null,
            schoolYear: null,
        }
    },

    computed: {
        schoolYears() {
            const currentYear = moment().year()
            const schoolYear = []

            for (let year = currentYear; year >= currentYear - 10; year--) {
                schoolYear.push({
                    value: [year, year + 1],
                    text: `${year}/${year + 1}`
                })
            }

            return schoolYear
        }
    },

    methods: {
        create() {

        }
    }
}
</script>
