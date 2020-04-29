<template>
    <v-container fluid class="blue-grey lighten-5">
        <v-container class="py-4 py-sm-8 py-md-12 text-center text-sm-left">
            <h2 class="display-1 mb-4">DMW++</h2>


            <v-row :no-gutters="$vuetify.breakpoint.smAndDown">
                <v-col cols="12" sm="8" md="10" order="1">
                    <p>
                        Database Modul dan Webtutorial plus Pembahasan (DMW++) merupakan salah satu program kerja divisi diklat HMIF berupa kumpulan (database) bahan materi kuliah (e-book, slide, dsb) untuk mempermudah mahasiswa Informatika UNDIP untuk mencari materi perkuliahan untuk dipelajari. Materi perkuliahan yang dihimpun berupa soal-soal (kuis, UTS serta UAS), modul perkuliahan serta pembahasan beberapa soal-soal.
                    </p>

                    <p>
                        Selain itu, webtutor (web-tutorial) merupakan kumpulan artikel mengenai pengembangan aplikasi website/desktop/mobile yang diharapkan dapat berguna bagi mahasiswa Informatika UNDIP.
                    </p>

                    <p>
                        Dengan adanya program kerja ini, diharapkan dapat membantu mahasiswa Informatika UNDIP dalam bidang akademis maupun non-akademis. Kritik dan saran dapat dilayangkan ke anggota divisi diklat, demi kemajuan HMIF yang lebih baik.
                    </p>

                    <p>
                        ?????
                    </p>
                </v-col>


                <v-col cols="12" sm="4" md="2" order="3" order-sm="2">
                    <v-img src="@/assets/images/logo.png" :height="logoHeight" contain class="mt-4 mt-sm-0"></v-img>
                </v-col>


                <v-col cols="12" order="2" order-sm="3">
                    <v-btn class="ma-2" href="http://hm.if.fsm.undip.ac.id" target="_blank" color="white">
                        <v-img src="@/assets/images/hmif.png" max-height="20" max-width="20" contain class="ml-n1 mr-2"></v-img>
                        HMIF Undip
                    </v-btn>

                    <v-btn class="ma-2" href="https://github.com/ranudwis/dmwplusplus" target="_blank" color="white">
                        <v-icon left>mdi-github</v-icon>
                        dmwplusplus
                    </v-btn>
                </v-col>
            </v-row>
        </v-container>
    </v-container>
</template>

<script>
export default {
    computed: {
        logoHeight() {
            return this.$vuetify.breakpoint.xsOnly ? 64 : undefined
        }
    }
}
</script>
