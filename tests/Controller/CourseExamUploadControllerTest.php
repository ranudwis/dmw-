<?php

namespace App\Tests\Controller;

use App\Repository\CourseExamRepository;
use App\Repository\CourseRepository;
use App\Repository\ExamRepository;
use App\Service\CloudStorage\File\GoogleDriveFile;
use App\Tests\Controller\Traits\CourseExamTrait;
use App\Tests\TestCase;

class CourseExamUploadControllerTest extends TestCase
{
    use CourseExamTrait;

    private $repository;
    private $course;
    private $exam;

    public function setUp()
    {
        parent::setUp();

        $courseRepository = static::$container->get(CourseRepository::class);
        $examRepository = static::$container->get(ExamRepository::class);
        $this->course = $courseRepository->findOneBy([]);
        $this->exam = $examRepository->findOneBy([]);
        $this->repository = static::$container->get(CourseExamRepository::class);

        $this->createFactoryMock();
    }

    public function testCanUploadQuestion()
    {
        $url = sprintf('courseexam/upload/%s/%s/question', $this->course->getSlug(), $this->exam->getId());
        $pdf = $this->createUploadedPdf();

        $this->client->xmlHttpRequest('PUT', $url, [], [
            'file' => $pdf
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals([
            'uploaded' => true,
        ]);
        $this->assertRepositoryHas($this->repository, [
            'course' => $this->course,
            'exam' => $this->exam,
            'questionPath' => 'filepath'
        ]);
    }
}
