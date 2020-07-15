<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class SemesterTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');
    }

    public function testCanIndexSemester()
    {
        $semesters = DB::table('semesters')->get();
        $this->json('GET', 'semester');

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'semesters' => $semesters
        ]);
    }

    public function testCanShowSemester()
    {
        $semester = DB::table('semesters')->first();
        $this->json('GET', 'semester/' . $semester->slug);

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id', 'type', 'slug', 'title', 'courses'
        ]);
    }
}
