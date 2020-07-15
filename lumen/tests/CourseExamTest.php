<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\Traits\ExamCreation;
use Tests\Traits\WithFaker;

class CourseExamTest extends TestCase
{
    use DatabaseMigrations;
    use ExamCreation;
    use WithFaker;

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

    public function testCanUpdateExamInformation()
    {
        $exam = $this->createExam();
        $newInformation = $this->faker->sentence;

        $this->json('PATCH', 'exam/' . $exam->id, [
            'information' => $newInformation
        ]);

        $this->assertResponseOk();
        $this->seeJsonEquals([ 'updated' => true ]);
        $this->notSeeInDatabase('course_exam', [
            'exam_id' => $exam->id,
            'information' => $exam->information
        ]);
        $this->seeInDatabase('course_exams', [
            'exam_id' => $exam->id,
            'information' => $newInformation
        ]);
    }
}
