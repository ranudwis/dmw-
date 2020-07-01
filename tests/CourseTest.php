<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CourseTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testCanIndexCourses()
    {
        $courses = DB::table('courses')
            ->select(
                'courses.id',
                'courses.slug',
                'courses.title',
                'courses.code',
                'semesters.title as semester',
                'semesters.type as semester_type',
                'courses.credit',
                'courses.is_visible',
            )
            ->join('semesters', 'courses.semester_id', '=', 'semesters.id')
            ->get();

        $this->json('GET', 'course');

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'courses' => $courses->toArray()
        ]);
    }
}
