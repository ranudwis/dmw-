<?php

use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semesters = [
            '1' => 'Semester 1',
            '2' => 'Semester 2',
            '3' => 'Semester 3',
            '4' => 'Semester 4',
            '5' => 'Semester 5',
            '6' => 'Semester 6',
            '7' => 'Semester 7',
            '8' => 'Semester 8',
            'pilihanganjil' => 'Pilihan Ganjil',
            'pilihangenap' => 'Pilihan Genap'
        ];

        foreach ($semesters as $slug => $semester) {
            DB::table('semesters')->insert([
                'slug' => $slug,
                'title' => $semester
            ]);
        }
    }
}
