<?php

namespace Tests\Traits;

use DB;

trait ExamCreation
{
    protected $examType = 'mid';
    protected $examSemester = 'even';
    protected $examSchoolYear = [ '2019', '2020' ];

    protected function createExam()
    {
        $this->json('POST', 'exam', [
            'type' => $this->examType,
            'semester' => $this->examSemester,
            'schoolYear' => $this->examSchoolYear
        ]);

        return DB::table('exams')->first();
    }
}
