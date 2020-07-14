<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\Traits\ExamCreation;

class CourseExamTest extends TestCase
{
    use DatabaseMigrations;
    use ExamCreation;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');
    }

    public function testCanIndexExamForParticularCourse()
    {
        $course = DB::table('courses')->first();

        $this->json('GET', 'course/' . $course->slug . '/exam');

        $this->assertResponseOk();
        $this->seeJsonStructure([ 'exams' ]);
    }

    public function testCanShowEmptyExam()
    {
        $this->createExam();
        $course = DB::table('courses')->first();
        $exam = DB::table('exams')->first();

        $this->json('GET', 'course/' . $course->slug . '/exam' . '/' . $exam->id);

        $this->assertResponseOk();
        $this->seeJson([
            'type' => $exam->type,
            'semester' => $exam->semester,
            'answers' => []
        ]);
    }
}
