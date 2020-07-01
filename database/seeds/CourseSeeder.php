<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @return void
     */
    public function run()
    {
        $semesters = [
            [
                'slug' => 1,
                'title' => 'Semester 1',
                'courses' => [
                    [
                        'code' => 'UNW00001',
                        'slug' => 'agama',
                        'title' => 'Pendidikan Agama',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21312',
                        'slug' => 'dasis',
                        'title' => 'Dasar Sistem',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21311',
                        'slug' => 'daspro',
                        'title' => 'Dasar Pemrograman',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21310',
                        'slug' => 'mtk1',
                        'title' => 'Matematika I',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21313',
                        'slug' => 'logif',
                        'title' => 'Logika Informatika',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21314',
                        'slug' => 'strukdat',
                        'title' => 'Struktur Data',
                        'credit' => 0,
                        'description' => '',
                    ]
                ]
            ], [
                'slug' => 2,
                'title' => 'Semester 2',
                'courses' => [
                    [
                        'code' => 'UNW00004',
                        'slug' => 'indonesia',
                        'title' => 'Bahasa Indonesia',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'UNW00005',
                        'slug' => 'or',
                        'title' => 'Olah Raga',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21323',
                        'slug' => 'statistik',
                        'title' => 'Statistika',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21320',
                        'slug' => 'mtk2',
                        'title' => 'Matematika II',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21322',
                        'slug' => 'oak',
                        'title' => 'Organisasi dan Arsitektur Komputer',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21324',
                        'slug' => 'alin',
                        'title' => 'Aljabar Linear',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21321',
                        'slug' => 'alpro',
                        'title' => 'Algoritma dan Pemrograman',
                        'credit' => 0,
                        'description' => '',
                    ],
                ]
            ], [
                'slug' => 3,
                'title' => 'Semester 3',
                'courses' => [
                    [
                        'code' => 'UNW00002',
                        'slug' => 'pancasila',
                        'title' => 'Pancasila',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21332',
                        'slug' => 'so',
                        'title' => 'Sistem Operasi',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21334',
                        'slug' => 'metnum',
                        'title' => 'Metode Numerik',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21331',
                        'slug' => 'strukdat',
                        'title' => 'Struktur Data',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21335',
                        'slug' => 'imk',
                        'title' => 'Interaksi Manusia Komputer',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21333',
                        'slug' => 'basdat',
                        'title' => 'Basis Data',
                        'credit' => 0,
                        'description' => '',
                    ],
                ]
            ], [
                'slug' => 4,
                'title' => 'Semester 4',
                'courses' => [
                    [
                        'code' => 'AIK21343',
                        'slug' => 'mdb',
                        'title' => 'Manajemen Basis Data',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21342',
                        'slug' => 'jarkom',
                        'title' => 'Jaringan Komputer',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21344',
                        'slug' => 'gkv',
                        'title' => 'Grafika dan Komputasi Visual',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21341',
                        'slug' => 'pbo',
                        'title' => 'Pemrograman Berorientasi Objek',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21346',
                        'slug' => 'sicer',
                        'title' => 'Sistem Cerdas',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21345',
                        'slug' => 'rpl',
                        'title' => 'Rekayasa Perangkat Lunak',
                        'credit' => 0,
                        'description' => '',
                    ]
                ]
            ], [
                'slug' => 5,
                'title' => 'Semester 5',
                'courses' => [
                    [
                        'code' => 'AIK21354',
                        'slug' => 'asa',
                        'title' => 'Analisis dan Strategi Algoritma',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21353',
                        'slug' => 'si',
                        'title' => 'Sistem Informasi',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21351',
                        'slug' => 'pbp',
                        'title' => 'Pengembangan Berbasis Platform',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'UNW00007',
                        'slug' => 'kwu',
                        'title' => 'Kewirausahaan',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21355',
                        'slug' => 'ppl',
                        'title' => 'Proyek Perangkat Lunak',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21356',
                        'slug' => 'pm',
                        'title' => 'Pembelajaran Mesin',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21352',
                        'slug' => 'ktp',
                        'title' => 'Komputasi Tersebar dan Paralel',
                        'credit' => 0,
                        'description' => '',
                    ],
                ]
            ], [
                'slug' => 6,
                'title' => 'Semester 6',
                'courses' => [
                    [
                        'code' => 'AIK21364',
                        'slug' => 'tbo',
                        'title' => 'Teori Bahasa dan Otomata',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21362',
                        'slug' => 'mep',
                        'title' => 'Masyarakat dan Etika Profesi',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21363',
                        'slug' => 'kji',
                        'title' => 'Keamanan dan Jaminan Informasi',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21365',
                        'slug' => 'mp',
                        'title' => 'Manajemen Proyek',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21361',
                        'slug' => 'upl',
                        'title' => 'Uji Perangkat Lunak',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'UNW00003',
                        'slug' => 'kwn',
                        'title' => 'Kewarganegaraan',
                        'credit' => 0,
                        'description' => '',
                    ]
                ]
            ]
        ];

        $even = false;
        foreach ($semesters as $semester) {
            $semesterId = DB::table('semesters')->insertGetId([
                'slug' => $semester['slug'],
                'type' => $even ? 'even' : 'odd',
                'title' => $semester['title'],
            ]);

            DB::table('courses')->insert(
                array_map(
                    function ($course) use ($semesterId) {
                        return $course + [
                            'semester_id' => $semesterId,
                        ];
                    },
                    $semester['courses']
                )
            );

            $even = ! $even;
        }
    }
}
