<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExamTest extends TestCase
{
    use DatabaseMigrations;

    private $type;
    private $semester;
    private $schoolYear;

    public function setUp(): void
    {
        parent::setUp();

        $this->type = 'mid';
        $this->semester = 'even';
        $this->schoolYear = [ '2019', '2020' ];
    }

    public function testCanCreateExam()
    {
        $this->createExam();

        $this->assertResponseOk();
        $this->seeJsonEquals([ 'created' => true ]);
        $this->seeInDatabase('exams', [
            'type' => $this->type,
            'semester' => $this->semester,
            'start_year' => $this->schoolYear[0],
            'end_year' => $this->schoolYear[1]
        ]);
    }

    private function createExam()
    {
        $this->json('POST', 'exam', [
            'type' => $this->type,
            'semester' => $this->semester,
            'schoolYear' => $this->schoolYear
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
                    'type' => $this->type,
                    'semester' => $this->semester,
                    'start_year' => $this->schoolYear[0],
                    'end_year' => $this->schoolYear[1],
                ]
            ]
        ]);
    }
}
