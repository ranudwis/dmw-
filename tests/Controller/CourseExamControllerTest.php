<?php

namespace App\Tests\Controller;

use App\Repository\CourseRepository;
use App\Tests\TestCase;

class CourseExamControllerTest extends TestCase
{
    private $courseRepository;

    public function setUp()
    {
        parent::setUp();

        $this->courseRepository = static::$container->get(CourseRepository::class);
    }

    public function testCanIndexExamOfCourse()
    {
        $course = $this->courseRepository->findOneBy([]);
        $this->client->xmlHttpRequest('GET', 'courseexam/' . $course->getSlug());

        $this->assertResponseIsSuccessful();
        $this->assertJsonStructure(['exams']);
    }
}
