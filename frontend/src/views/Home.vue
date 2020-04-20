<template>
    <v-app>
        <v-app-bar app color="primary" dark>
            <v-img
                alt="Logo"
                src="@/assets/images/logo_white.png"
                max-height="90%"
                max-width="50"
                contain
                class="shrink mx-2"
            ></v-img>

            <v-toolbar-title>DMW++</v-toolbar-title>

            <v-toolbar-items class="ml-4">
                <v-btn text>
                    <v-icon left>mdi-home</v-icon>
                    home
                </v-btn>
                <v-btn text>
                    <v-icon left>mdi-book-open-page-variant</v-icon>
                    soal &amp; modul
                </v-btn>
                <v-btn text>
                    <v-icon left>mdi-web</v-icon>
                    webtutor
                </v-btn>
            </v-toolbar-items>

            <v-spacer></v-spacer>

            <v-toolbar-items>
                <v-btn text>
                    <v-icon left>mdi-account</v-icon>
                    login
                </v-btn>
            </v-toolbar-items>
        </v-app-bar>

        <v-content>
            <v-container fluid class="pa-0 tw-relative">
                <v-img src="@/assets/images/cover.jpg" min-height="500" max-height="70vh"></v-img>

                <v-row justify="center" class="flex-column ma-0 pa-12 tw-absolute tw-inset-0">
                    <p class="display-4 white--text">
                        DMW++
                    </p>
                    <p class="title white--text">
                        Database Modul dan Webutor Dikat HMIF Undip
                    </p>
                    <div style="width: 500px">
                        <v-text-field
                            autofocus
                            solo
                            rounded
                            full-width
                            hide-details
                            append-icon="mdi-magnify"
                            placeholder="Cari modul dan webtutor..."
                            >
                        </v-text-field>
                    </div>

                    <div style="width: 400px" class="mt-4">
                        <v-row>
                            <v-col cols="6">
                                <v-btn block x-large color="secondary" dark>
                                    <v-icon left>mdi-book-open-page-variant</v-icon>
                                    soal &amp; modul
                                </v-btn>
                            </v-col>
                            <v-col cols="6">
                                <v-btn block x-large color="secondary" dark>
                                    <v-icon left>mdi-web</v-icon>
                                    webtutor
                                </v-btn>
                            </v-col>
                        </v-row>
                    </div>
                </v-row>
            </v-container>

            <v-container class="my-4">
                <h2 class="headline">
                    <v-icon>mdi-web</v-icon>
                    Webtutor terbaru



                    <v-btn text small color="primary" class="ml-4">
                        Selengkapnya

                        <v-icon right>mdi-chevron-right</v-icon>
                    </v-btn>
                </h2>

                <v-row class="mt-4">
                    <v-col v-for="i in 4" cols="3" :key="i">
                        <v-card>
                            <v-img src="@/assets/images/cover.jpg" max-height="200px" position="top"></v-img>
                            <v-card-title>Cara membuat sesuatu dengan menggunakan sesuatu lain yang akan membuat</v-card-title>
                            <v-card-text>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>

            <v-container class="my-4">
                <h2 class="headline">
                    <v-icon>mdi-book-open-page-variant</v-icon>
                    Modul dan pembahasan terbaru
                </h2>

                <v-list>
                    <v-list-item v-for="i in 6" :key="i">
                        <v-list-item-title>Item ke-{{ i }}</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-container>

            <v-container fluid class="blue-grey lighten-5 mt-8">
                <v-container class="py-12">
                    <h2 class="display-1 mb-4">DMW++</h2>

                    <v-row>
                        <v-col cols="10">
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

                        <v-col cols="2">
                            <v-img src="@/assets/images/logo.png"></v-img>
                        </v-col>
                    </v-row>

                    <v-btn class="mr-4" color="white">
                        <v-img src="@/assets/images/hmif.png" max-height="20" max-width="20" contain class="ml-n1 mr-2"></v-img>
                        HMIF Undip
                    </v-btn>

                    <v-btn href="https://github.com/ranudwis/dmwplusplus" target="_blank" color="white">
                        <v-icon left>mdi-github</v-icon>
                        dmwplusplus
                    </v-btn>
                </v-container>
            </v-container>
        </v-content>
    </v-app>
</template>
