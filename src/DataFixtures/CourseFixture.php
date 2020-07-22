<?php

namespace App\DataFixtures;

use App\Entity\Semester;
use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

 /**
   * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
   */
class CourseFixture extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['initialData'];
    }

    public function load(ObjectManager $manager)
    {
        // phpcs:disable Generic.Files.LineLength.TooLong
        $semesters = [
            [
                'slug' => 1,
                'title' => 'Semester 1',
                'courses' => [
                    [
                        'code' => 'UNW00001',
                        'slug' => 'agama',
                        'title' => 'Pendidikan Agama',
                        'credit' => '2',
                        'description' => 'Visi mata kuliah Pendidikan Agama adalah "terbentuknya mahasiswa yang memiliki kepribadian utuh (kaffah) dengan menjadikan ajaran Islam sebagai landasan berpikir dan berperilaku dalam pengembangan kepribadian, keilmuan, dan profesinya". Mahasiswa belajar menjadi ilmuwan dan profesional yang beriman dan bertaqwa terhadap Tuhan Yang Maha Esa, berakhlak mulia, dan memiliki etos kerja, serta menjunjung tinggi nilai-nilai kemanusiaan dan kehidupan.'
                    ], [
                        'code' => 'AIK21312',
                        'slug' => 'dasis',
                        'title' => 'Dasar Sistem',
                        'credit' => '3',
                        'description' => 'Mata kuliah ini menjadi dasar pada bidang kajian infrastruktur siste yang mengenalkan sistem digital sebagai dasar membangun sistem komputer, hingga pembangunan komponen prosesor sederhana berupa SAP-1 (simple as possible - 1).'
                    ], [
                        'code' => 'AIK21311',
                        'slug' => 'daspro',
                        'title' => 'Dasar Pemrograman',
                        'credit' => '3',
                        'description' => 'Pada semester 1, mahasiswa berkenalan dengan pemrograman sederhana dalam kuliah Dasar Pemrograman. Pemrograman ini memandang bahwa solusi persoalan adalah sekumpulan fungsi yang saling memanggil dan saling melayani. Konsep tipe data menjadi dasar pengolahan nilai dengan konsep rekursif. Fokus dari pemrograman ini adalah pembuatan rancanagan fungsi secara utuh, yang terdiri atas Definisi, Spesifikasi , Realisasi, dan Aplikasi. Di kelas, mahasiswa belajar notasi fungsional, sedangkan di laboratorium, mahasiswa belajar salah satu bahasa pemrograman yang relevan, misalnya LISP, Haskell, Scheme, atau F#.'
                    ], [
                        'code' => 'AIK21310',
                        'slug' => 'mtk1',
                        'title' => 'Matematika I',
                        'credit' => '2',
                        'description' => 'Mata kuliah ini menjelaskan konsep dasar Matematika I, konsep dan aplikasi deratif, integral tak tentu dan tentu.'
                    ], [
                        'code' => 'AIK21313',
                        'slug' => 'logif',
                        'title' => 'Logika Informatika',
                        'credit' => '3',
                        'description' => 'Materi yang diberikan pada kuliah ini mencakup pengantar computational logic, representasi proportional logic mencakup sintaks dari semantik, representasi relational logic mencakup sintaks dan semantik, berbagai teknk pembuktian dari pendekatan semanctic reasoning maupun proof method untuk proportional logic dan relational logic, serta paradigm pemrograman deklaratif yang menggunakan dasar relational logic untuk melakukan penalaran.'
                    ], [
                        'code' => 'AIK21314',
                        'slug' => 'strukdat',
                        'title' => 'Struktur Data',
                        'credit' => '4',
                        'description' => 'Mata kuliah ini berisi tentang tipe tipe data yang dibutuhkan dalam pemrograman, seperti tipe data dasar, array, stack, queue, string, set, graph, list, dan hash.'
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
                        'credit' => '2',
                        'description' => 'Mata kuliah ini berisi pengetahuan tentang sejarah kedudukan dan fungsi bahasa, ragam bahasa ilmiah, membaca kritis, EBI da kata baku, kalimat efektif, paragraf, menulis makalah dan laporan, menulis proposal, kutipan dan rujukan, daftar pustaka, presentasi ilmiah, dan penyajian lisan, dan menulis surat.'
                    ], [
                        'code' => 'UNW00005',
                        'slug' => 'or',
                        'title' => 'Olah Raga',
                        'credit' => '1',
                        'description' => 'Mata kuliah ini membekali mahassiswa dengan pemahaman tentang gerak, aktivitas fisik, permainan, dan olah raga.Mata kuliah ini juga memberikan pemahaman tentang fungsi dan esensi pendidikan jasmani, olah raga, serta hubungannya dengan kebugaran dan kesehatan.'
                    ], [
                        'code' => 'AIK21323',
                        'slug' => 'statistik',
                        'title' => 'Statistika',
                        'credit' => '2',
                        'description' => 'Mata kuliah Statistika merupakan mata kuliah yang berguna untuk membantu mata kuliah lain yang berhubungan dengan penelitian. Harapan yang ingin dicapai adalah dapat menggunakan ilmu statistik untuk penelitian dengan berdasar pada metode ilmiah. Perangkat lunak yang dipakai adalah SPSS. Dalam pembelajarannya menggunakan cara Discovery Lernaning dan Problem Based Learning yang digabung dengan Simulation/Demonstration. Untuk proses analisisnya dimulai dengan pemberian kasus, input data, komputasi, hingga keluar olahan. Selanjutnya dilakukan analisis dengan menggunakan metode yang relevan yang ada di statistika.'
                    ], [
                        'code' => 'AIK21320',
                        'slug' => 'mtk2',
                        'title' => 'Matematika II',
                        'credit' => '2',
                        'description' => 'Mata kuliah ini membahas mengenai integral lipat dua serta persamaan differensial biasa dan parsial.'
                    ], [
                        'code' => 'AIK21322',
                        'slug' => 'oak',
                        'title' => 'Organisasi dan Arsitektur Komputer',
                        'credit' => '4',
                        'description' => 'Mata kuliah ini menjelaskan dasar kerja dan komponen pembentuknya serta urutan untuk mengeksekusi suatu instruksi. Juga menjelaskan organisasi dan fungsi setiap komponen pembentuk komputer serta menjelaskan konsep pipelining sebagai salah satu cara pemrosesan paralel.'
                    ], [
                        'code' => 'AIK21324',
                        'slug' => 'alin',
                        'title' => 'Aljabar Linear',
                        'credit' => '3',
                        'description' => 'Mata kuliah ini membekali kemampuan mahasiswa dalam memformulasikan masalah sains dan teknologi ke dalam ruang vektor, basis dan dimensi, transformasi linear, ruang inner product, eigen vektor dan eigen values, bentuk kuadrat, dan bentuk kanonik Jordan(pengayaan).'
                    ], [
                        'code' => 'AIK21321',
                        'slug' => 'alpro',
                        'title' => 'Algoritma dan Pemrograman',
                        'credit' => '4',
                        'description' => 'Mahasiswa mampu memahami konsep-konsep bahasa pemrograman, mengidentifikasi model-model bahasa pemrograman, serta membandingkan berbagai solusi. Mahasiswa mampu menerapkan konsep abstraksi dan struktur data dalam merancang program komputer.'
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
                        'credit' => '2',
                        'description' => 'Dengan penyelenggaraan Pendidikan Pancasila di Perguruan Tinggi, diharapkan dapat tercipta wahana pembelajaran bagi para mahasiswa untuk secara akademik mengkaji, menganalisis, dan memecahkan masalah-masalah pembangunan bangsa dan negara dalam perspektif nilai-nilai dasar pancasila sebagai ideologi dan dasar negara Republik Indonesia. Mahasiswa mampu membangun paradigma baru dalam dirinya sendiri nilai-nilai Pancasila melalui kemampuan menjelaskan sejarah, kedudukan dan hakikat sila-sila Pancasila, merespon persoalan aktual bangsa dan negara, dan menerapkan nilai-nilai Pancasila dalam kehidupan.'
                    ], [
                        'code' => 'AIK21332',
                        'slug' => 'so',
                        'title' => 'Sistem Operasi',
                        'credit' => '3',
                        'description' => 'Sistem Operasi merupakan kajian mendasar untuk pendidikan ilmu komputer yang membahas konsep-konsep secara teoritis dan aspek perancangan sistem operasi, yaitu apa yang dilakukan sistem operasi dan bagaimana sistem operasi diimplementasikan.'
                    ], [
                        'code' => 'AIK21334',
                        'slug' => 'metnum',
                        'title' => 'Metode Numerik',
                        'credit' => '3',
                        'description' => 'Mata kuliah ini membekali kemampuan Mahasiswa dalam memformulasikan masalah sains dan teknologi ke dalam model matematika dan metode numerik, selanjutnya mencari penyelesaiannya dengan membuat program komputer.'
                    ], [
                        'code' => 'AIK21331',
                        'slug' => 'strukdat',
                        'title' => 'Struktur Data',
                        'credit' => '4',
                        'description' => 'Mata kuliah ini berisi tentang tipe tipe data yang dibutuhkan dalam pemrograman, seperti tipe data dasar, array, stack, queue, string, set, graph, list, dan hash.'
                    ], [
                        'code' => 'AIK21335',
                        'slug' => 'imk',
                        'title' => 'Interaksi Manusia Komputer',
                        'credit' => '3',
                        'description' => 'Matakuliah ini memberikan dasar konsep dan praktis tentang interaksi manusia dan komputer, model interaksi, perancangan dan implementasi antar-muka manusia dan komputer serta penggunaan tools untuk pengembangan software interface manusia dan komputer. Setelah mengikuti kuliah ini diharapkan mahasiswa mempunyai pemahaman tentang human cognition, memori manusia, penyelesaian masalah, bahasa serta apa dan bagaimana keterkaitan hal-hal tersebut dalam merancang dan mengembangkan sistem interaktif.'
                    ], [
                        'code' => 'AIK21333',
                        'slug' => 'basdat',
                        'title' => 'Basis Data',
                        'credit' => '4',
                        'description' => 'Mata kuliah basis data bertujuan memberikan pengetahuan mengenai basis data secara teoritis dan praktis yang difokuskan pada sistem basis data relational, serta kemampuan dasar di dalam menggunakan Sistem Manajemen Basis Data. Pengetahuan dan kemampuan dasar tersebut memberikan manfaat di dalam merancang pengelolaan data untuk suatu sistem informasi. Praktikum di laboratorium komputer dan penyelesaian tugas dari dosen akan memberikan ketrampilan dasar di dalam menggunakan Sistem Manajemen Basis Data yang dirancang untuk sistem personal maupun sistem basis data komersial.'
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
                        'credit' => '3',
                        'description' => 'Materi yang diberikan pada kuliah ini mencakup peningkatan perfomansi basis data melalui perbaikan skema (termasuk indeks) dan query, pengelolaan keamanan dan kontrol akses pengguna, pengelolaan transaksi serta pemulihan basis data saat terjadi gangguan, pemrograman basis data menggunakan fungsi dan prosedur tersimpan di basis data, oenjagaan integritas basis data dengan memanfaatkan constraint, assertions, dan triggers, serta pengelolaan basis data terdistribusi,'
                    ], [
                        'code' => 'AIK21342',
                        'slug' => 'jarkom',
                        'title' => 'Jaringan Komputer',
                        'credit' => '3',
                        'description' => 'Mata kuliah jaringan komputer diawali dengan pemahaman terhadap konsep protokol dilanjutkan dengan memperkenalkan dua stack protokol yaitu OSI dan TCP/IP. Berikutnya dibahas detil tiap lapisan pada TCP/IP dari bawah (lapisan fisik) hingga yang teratas (lapisan aplikasi). Pemahaman terhadap protokol-protokol TCP/IP menjadi dasar untuk dapat merancang jaringan komputer secara efektif, efisien, dan aman di suatu organisasi nyata.'
                    ], [
                        'code' => 'AIK21344',
                        'slug' => 'gkv',
                        'title' => 'Grafika dan Komputasi Visual',
                        'credit' => '3',
                        'description' => 'Grafika dan Komputasi Visual adalah salah satu mata kuliah dalam Ilmu Komputer yang membahasa tentang konsep grafika komputasi dan pengelolaan citra digital. Pada mata kuliah ini akan dibahas tentang konsep dan perbedaan antara grafika komputer dan pengelolaan citra digital. Materi akan berkisar tentang pembangunan suatu primitif dalam grafika komputer dan diikuti dengan teknik-teknik manipulasi pada objek primitif. Primitif yang dimaksud adalah primitif pada dimensi 2 dan dimensi 3. Selain itu, pembahasan dilanjutkan dengan konsep citra digital dan teknik-teknik yang dapat digunakan dalam manipulasi dan pengelolaan citra digital. '
                    ], [
                        'code' => 'AIK21341',
                        'slug' => 'pbo',
                        'title' => 'Pemrograman Berorientasi Objek',
                        'credit' => '3',
                        'description' => 'Mata kuliah Pemrograman Berorientasi Objek menyajikan konsep dan penerapan paradigma Pemrograman Berorientasi Objek.'
                    ], [
                        'code' => 'AIK21346',
                        'slug' => 'sicer',
                        'title' => 'Sistem Cerdas',
                        'credit' => '3',
                        'description' => 'Mata kuliah ini merupakan mata uliah wajib yang mempelajari tentang solusi-solusi dari masalah yang sulit dann tidak praktis jika menggunakan pendekatan tradisional. Hal ini untuk mendukung oencarian solusi bagi aplikasi-aplikasi harian seperti email, pemrosesan kata dan pencarian, dimana dalam desain dan analisis dari otomatis agent tergantung dari lingkungan dan persepsi yang di terima. Ada tiga hal utama yang dipelajari yaitu skema representasi pengetahuan, mekanisme penyelesaian masalah dan teknik pembelajaran.'
                    ], [
                        'code' => 'AIK21345',
                        'slug' => 'rpl',
                        'title' => 'Rekayasa Perangkat Lunak',
                        'credit' => '3',
                        'description' => 'Mata kuliah ini merupakan mata kuliah wajib yang memberikan pengertian tentang rekayasa perangkat lunak dan kemampuan dasar dalam membangun perangkat lunak skala kecil dan sederhana, serta kemampuan mengoperasikan tools terkait pemodelan perangkat lunak. Adapun materi yang diberikan meliputi: Tipe Perangkat Lunak (P/L); Pengantar Rekayasa P/L; Siklus Hidup P/L, mencakup pengumpulan kebutuhan, analisis, perancangan, implementasi, pengujian, pengoperasian, dan perawatan; Berbagai Model Proses, mencakup waterfall, prototyping,, incremental, agile process model, dll; Metodologi Pembagunan P/L (termasuk metode berorientasi objek): kelebihan, kekurangan, dan aspek praktisnya di industri; Standard dan Dokumentasi P/L, mencakup SDD, SRS, SDD, STP; Alat Bantu Pemodelan P/L, mencakup UML dan DFD; Studi kasus: Pembangunan P/L Skala Kecil (diberikan spesifikasi kebutuhan, dilakukan analisis, perancangan, dan perencanaan pengujian). Dengan materi tersebut diharapkan mahasiswa mampu mengembangkan diri untuk mempelajari mata kuliah lain yang lebih lanjut dengan baik.'
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
                        'credit' => '3',
                        'description' => 'Mahasiswa belajar cara menganalisis algoritma dari aspek komputasional dan merancang solusi berdasarkan kasus yang mirip dengan algoritma baku yang sudah ada, tentunya dengan sedikit penyesuaian.'
                    ], [
                        'code' => 'AIK21353',
                        'slug' => 'si',
                        'title' => 'Sistem Informasi',
                        'credit' => '3',
                        'description' => 'Pada kuliah ini diberikan pengerian dan pengetahuan tentang jenis, fungsi, struktur dan peran informasi berbasis komputer pada suatu organisasi. Selain itu mahasiswa juga diberikan kemampuan untuk melakukan analisis dan penetapan kebutuhan informasi organisasi, mentransformasikan kebutuhan kedalam rancangan sistem informasi yang sesuai dan menerapkannya ke dalam bentuk prototipe, sehingga organisasi dan manajemen akan lebih produktif, efisien, dan efektif sehingga diharapkan akan memiliki keunggulan untuk berkompetisi.'
                    ], [
                        'code' => 'AIK21351',
                        'slug' => 'pbp',
                        'title' => 'Pengembangan Berbasis Platform',
                        'credit' => '3',
                        'description' => 'Pada semester 5 (lima), mahasiswa belajar pemrograman Web dan aplikasi mobile. Mahasiswa belajar konsep skripting paling sederhana HTML-*ML, CSS, *script, sampai bahasa PHP/ASP. Mahasiswa juga belajar membuat aplikasi mobile sederhana. Selain itu mahasiswa dikenalkan pada platform lain yaitu game dan industrial.'
                    ], [
                        'code' => 'UNW00007',
                        'slug' => 'kwu',
                        'title' => 'Kewirausahaan',
                        'credit' => '2',
                        'description' => 'Kewirausahaan adalah kemampuan kreatif dan inovatif yang dijadikan dasar, kiat, dan sumber daya untuk mencari peluang menuju sukses. Melalui proses kreatif dan inovatif akan tercipta sesuatu yang baru dan berbeda yang dapat dijadikan nilai tambah untuk mencapai keunggulan bersaing. Mata kuliah Kewirausahaan dirancang membekali mahasiswa agar dapat mempunyai pengetahuan, jiwa kewirausahaan, dan mampu melakukan simulasi kewirausahaan. Melalui kuliah ini kepada mahasiswa akan diberikan pengetahuan serta pemahaman tentang pentingnya karakter dan semangat Kewirausahaan, mengkomunikasikan ide dan pemikirannya kepada orang lain, dan mampu secara mandiri atau bersama-sama menciptakan produk jasa maupun layanan yang mempunyai potensi untuk dijual.'
                    ], [
                        'code' => 'AIK21355',
                        'slug' => 'ppl',
                        'title' => 'Proyek Perangkat Lunak',
                        'credit' => '3',
                        'description' => 'Definisi perangkat lunak skala besar; berbagai masalah dalam pengembangan perangkat lunak skala besar dan solusinya; abstraksi; SW Pattern; code generator; pengenalan berbagai platform, framework, dan tools; konfigurasi P/L (konsep, tools, pracitces...); dilengkapi dengan studi kasus berupa proyek pembangunan P/L skala besar dengan mempraktekkan semua teori yang telah diberikan, atau berupa reverse engineering suatu perangkat lunak skala besar untuk mendapatkan modelnya.'
                    ], [
                        'code' => 'AIK21356',
                        'slug' => 'pm',
                        'title' => 'Pembelajaran Mesin',
                        'credit' => '3',
                        'description' => 'eiring dengan semakin banyaknya berbagai aplikasi di berbagai domain (seperti bioinformatics, computer vision, robotics, dan lain-lain) maka kita akan menyaksikan semakin banyak pula dijumpai data yang kompleks, sehingga diperlukan sebuah cara untuk dapat menyajikan informasi data-data tersebut secara lebih efektif dan efisien. Bidang machine learning menawarkan beberapa teknik untuk (otomatis) menyimpulkan pola yang erguna dalam data, dan membuat prediksi dari data terebut. Teknik-teknik yang akan dipelajari dalam mata kuliah ini terfokus ke dalam tiga metode, yakni supervised learning, unsupervised learning dan reinforment learning. Pada mata kuliah ini juga akan dijelaskan bagaimana teknik evaluasi untuk menilai kinerja dari ketiga metode teserbut. Kajian mengenai teknik utuk mengatasi permasalahan curse of dimentionality serta ensamble learning menjadi bahasan akhir dari mata kuliah machine learning.'
                    ], [
                        'code' => 'AIK21352',
                        'slug' => 'ktp',
                        'title' => 'Komputasi Tersebar dan Paralel',
                        'credit' => '3',
                        'description' => 'Mata kuliah Kualitas Komputer Tersebar dan Paralel menyajian konsep dan penerapan Komputasi Tersebar dan Paralel.'
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
                        'credit' => '3',
                        'description' => 'Mata kuliah Teori Bahasa dan Automata merupakan matakuliah yang mempelajari konsep-konsep, metode-metode yang dapat digunakan untuk mengetahui macam-macam mesin automata, masukannya, atau keluarannya beserta tatabahasanya yang digunakan sebagai aturan yang berlaku pada mesin automata tersebut. Matakuliah ini berisi mengenai jenis-jenis automata, masukan string pada automata, beserta keluaran yang dihasilkan oleh automata tersebut.'
                    ], [
                        'code' => 'AIK21362',
                        'slug' => 'mep',
                        'title' => 'Masyarakat dan Etika Profesi',
                        'credit' => '3',
                        'description' => 'Mata kuliah ini merupakan mata kuliah dasar berguna untuk membekali mahasiswa terkait isu sosial, etis, legal dan profesional dalam disiplin Ilmu Komputer. Adapun materi yang diberikan meliputi: etika komputer, kakas analitas dan pengambilan putusan, kekayaan intelektual, kejahatan komputer dan aspek legalnya, privasi, dampak sosial teknologi informasi, klasifikasi profesi, kode etik profesi, organisasi/asosiasi profesi dan sertifikasi di bidang TI. Dengan materi tersebut diharapkan mahasiswa memiliki bekal untuk bersikap etis dan profesional dalam menjalankan karirnya di bidang TI.'
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
                        'credit' => '3',
                        'description' => 'Kuliah ini memberikan landasan pengetahuan mengenai manajemen proyek dalam teknologi informasi dan penerapannya pada sebuah proyek perangkat lunak berdasarkan metodologi pengembangan perangkat lunak sesuai standar internasional.'
                    ], [
                        'code' => 'AIK21361',
                        'slug' => 'upl',
                        'title' => 'Uji Perangkat Lunak',
                        'credit' => '3',
                        'description' => 'Mata kuliah Uji Perangkat Lunak memberikan landasan pegetahuan mengenai pengujian perangkat lunak yang meliputi siklus hidup pengujian, dan berbagai macam jenis pengujian yang dapat dilakukan pada perangkat lunak. Materi disusun berdasarkan siklus hidup pengujian, dtambah dengan berbagai materi terkait seperti pengujian pada artifak/aplikasi spesifik, pembentukan tim pengujian, dan memonitoring pengujian.'
                    ], [
                        'code' => 'UNW00003',
                        'slug' => 'kwn',
                        'title' => 'Kewarganegaraan',
                        'credit' => '2',
                        'description' => 'Mahasiswa belajar untuk menganalisis masalah kontekstual kewarganegaraan, mengembangkan sikap positif, dan menampilkan perilaku mendukung yang berkaitan dengan semangat kebangsaan, cinta tanah air,  demokrasi berkeadaban dan kesadaran hukum.'
                    ]
                ]
            ]
        ];
        // phpcs:enable

        $even = false;
        foreach ($semesters as $semesterData) {
            $semester = new Semester();
            $semester->setSlug($semesterData['slug']);
            $semester->setTitle($semesterData['title']);
            $semester->setType($even ? Semester::EVEN : Semester::ODD);


            foreach ($semesterData['courses'] as $courseData) {
                $course = new Course();
                $course->setCode($courseData['code']);
                $course->setSlug($courseData['slug']);
                $course->setTitle($courseData['title']);
                $course->setCredit($courseData['credit']);
                $course->setDescription($courseData['description']);

                $manager->persist($course);
                $semester->addCourse($course);
            }

            $manager->persist($semester);

            $even = ! $even;
        }

        $manager->flush();
    }
}
