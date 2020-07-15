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

    /**
     * @depends(testCanCreateExam)
     */
    public function testCanIndexExam()
    {
        $exam = $this->createExam();

        $this->json('GET', 'exam');

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'exams' => [
                [
                    'id' => $exam->id,
                    'type' => $this->examType,
                    'semester' => $this->examSemester,
                    'start_year' => $this->examSchoolYear[0],
                    'end_year' => $this->examSchoolYear[1],
                ]
            ]
        ]);
    }
}
