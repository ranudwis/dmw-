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
                        'name' => 'Pendidikan Agama',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21312',
                        'slug' => 'dasis',
                        'name' => 'Dasar Sistem',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21311',
                        'slug' => 'daspro',
                        'name' => 'Dasar Pemrograman',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21310',
                        'slug' => 'mtk1',
                        'name' => 'Matematika I',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21313',
                        'slug' => 'logif',
                        'name' => 'Logika Informatika',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21314',
                        'slug' => 'strukdat',
                        'name' => 'Struktur Data',
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
                        'name' => 'Bahasa Indonesia',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'UNW00005',
                        'slug' => 'or',
                        'name' => 'Olah Raga',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21323',
                        'slug' => 'statistik',
                        'name' => 'Statistika',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21320',
                        'slug' => 'mtk2',
                        'name' => 'Matematika II',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21322',
                        'slug' => 'oak',
                        'name' => 'Organisasi dan Arsitektur Komputer',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21324',
                        'slug' => 'alin',
                        'name' => 'Aljabar Linear',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21321',
                        'slug' => 'alpro',
                        'name' => 'Algoritma dan Pemrograman',
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
                        'name' => 'Pancasila',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21332',
                        'slug' => 'so',
                        'name' => 'Sistem Operasi',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21334',
                        'slug' => 'metnum',
                        'name' => 'Metode Numerik',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21331',
                        'slug' => 'strukdat',
                        'name' => 'Struktur Data',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21335',
                        'slug' => 'imk',
                        'name' => 'Interaksi Manusia Komputer',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21333',
                        'slug' => 'basdat',
                        'name' => 'Basis Data',
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
                        'name' => 'Manajemen Basis Data',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21342',
                        'slug' => 'jarkom',
                        'name' => 'Jaringan Komputer',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21344',
                        'slug' => 'gkv',
                        'name' => 'Grafika dan Komputasi Visual',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21341',
                        'slug' => 'pbo',
                        'name' => 'Pemrograman Berorientasi Objek',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21346',
                        'slug' => 'sicer',
                        'name' => 'Sistem Cerdas',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21345',
                        'slug' => 'rpl',
                        'name' => 'Rekayasa Perangkat Lunak',
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
                        'name' => 'Analisis dan Strategi Algoritma',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21353',
                        'slug' => 'si',
                        'name' => 'Sistem Informasi',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21351',
                        'slug' => 'pbp',
                        'name' => 'Pengembangan Berbasis Platform',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'UNW00007',
                        'slug' => 'kwu',
                        'name' => 'Kewirausahaan',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21355',
                        'slug' => 'ppl',
                        'name' => 'Proyek Perangkat Lunak',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21356',
                        'slug' => 'pm',
                        'name' => 'Pembelajaran Mesin',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21352',
                        'slug' => 'ktp',
                        'name' => 'Komputasi Tersebar dan Paralel',
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
                        'name' => 'Teori Bahasa dan Otomata',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21362',
                        'slug' => 'mep',
                        'name' => 'Masyarakat dan Etika Profesi',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21363',
                        'slug' => 'kji',
                        'name' => 'Keamanan dan Jaminan Informasi',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21365',
                        'slug' => 'mp',
                        'name' => 'Manajemen Proyek',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'AIK21361',
                        'slug' => 'upl',
                        'name' => 'Uji Perangkat Lunak',
                        'credit' => 0,
                        'description' => '',
                    ], [
                        'code' => 'UNW00003',
                        'slug' => 'kwn',
                        'name' => 'Kewarganegaraan',
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
