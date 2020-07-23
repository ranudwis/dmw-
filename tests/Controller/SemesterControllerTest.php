<?php

namespace App\Tests\Controller;

use App\Tests\TestCase;

class SemesterControllerTest extends TestCase
{
    public function testCanIndexSemester()
    {
        $this->client->xmlHttpRequest('GET', 'semester');

        $this->assertResponseIsSuccessful();
        $this->assertJsonStructure([ 'semesters' ]);
    }

    public function testCanIndexSemesterWithCourses()
    {
        $this->client->xmlHttpRequest('GET', 'semester/withCourses');

        $this->assertResponseIsSuccessful();
        $this->assertJsonStructure([ 'semesters' ]);
    }
}
