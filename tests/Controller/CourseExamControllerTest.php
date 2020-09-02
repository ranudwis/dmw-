<?php

namespace App\Tests\Controller;

use App\Tests\Controller\Traits\CourseExamTrait;
use App\Entity\CourseExam;
use App\Repository\CourseExamRepository;
use App\Repository\CourseRepository;
use App\Repository\ExamRepository;
use App\Tests\TestCase;

class CourseExamControllerTest extends TestCase
{
    use CourseExamTrait;

    private $repository;
    private $courseRepository;
    private $examRepository;
    private $course;
    private $exam;

    public function setUp()
    {
        parent::setUp();

        $this->repository = static::$container->get(CourseExamRepository::class);
        $this->courseRepository = static::$container->get(CourseRepository::class);
        $this->examRepository = static::$container->get(ExamRepository::class);
        $this->course = $this->courseRepository->findOneBy([]);
        $this->exam = $this->examRepository->findOneBy([]);

        $this->createFactoryMock();
    }

    public function testCanIndexExamOfCourse()
    {
        $this->client->xmlHttpRequest('GET', 'courseexam/' . $this->course->getSlug());

        $this->assertResponseIsSuccessful();
        $this->assertJsonStructure(['exams']);
    }

    public function testCanShowCourseExamWithSlugAndExamId()
    {
        $this->client->xmlHttpRequest('GET', 'courseexam/' . $this->course->getSlug() . '/' . $this->exam->getId());

        $this->assertResponseIsSuccessful();
        $this->assertJsonStructure([
            'id',
            'information',
            'folderPath',
            'questionPath',
            'questionAndAnswerPath',
            'exam'
        ]);
    }

    public function testCanUpdateInformation()
    {
        $url = sprintf('courseexam/%s/%s/information', $this->course->getSlug(), $this->exam->getId());
        $informationData = [
            'information' => $this->faker->sentence
        ];

        $this->client->xmlHttpRequest('PUT', $url, $informationData);

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals([
            'updated' => true
        ]);
        $this->assertRepositoryHas($this->repository, $informationData);
    }
}
