<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\Traits\ExamCreation;

class ExamTest extends TestCase
{
    use DatabaseMigrations;
    use ExamCreation;

    public function testCanCreateExam()
    {
        $this->createExam();

        $this->assertResponseOk();
        $this->seeJsonEquals([ 'created' => true ]);
        $this->seeInDatabase('exams', [
            'type' => $this->examType,
            'semester' => $this->examSemester,
            'start_year' => $this->examSchoolYear[0],
            'end_year' => $this->examSchoolYear[1]
        ]);
    }

    private function createExam()
    {
        $this->json('POST', 'exam', [
            'type' => $this->examType,
            'semester' => $this->examSemester,
            'schoolYear' => $this->examSchoolYear
        ]);
    }

    /**
     * @depends(testCanCreateExam)
     */
    public function testCanIndexExam()
    {
        $this->createExam();
        $examId = DB::table('exams')->first()->id;

        $this->json('GET', 'exam');

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'exams' => [
                [
                    'id' => $examId,
                    'type' => $this->examType,
                    'semester' => $this->examSemester,
                    'start_year' => $this->examSchoolYear[0],
                    'end_year' => $this->examSchoolYear[1],
                ]
            ]
        ]);
    }
}
