<?php

namespace App\Tests\Controller;

use App\Repository\CourseExamRepository;
use App\Repository\CourseRepository;
use App\Repository\ExamRepository;
use App\Service\CloudStorage\Folder\FolderInterface;
use App\Service\CloudStorage\Storage\StorageInterface;
use App\Tests\TestCase;

class CourseExamControllerTest extends TestCase
{
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
    }

    public function testCanIndexExamOfCourse()
    {
        $this->client->xmlHttpRequest('GET', 'courseexam/' . $this->course->getSlug());

        $this->assertResponseIsSuccessful();
        $this->assertJsonStructure(['exams']);
    }

    public function testCanShowCourseExamWithSlugAndExmanId()
    {
        $this->client->xmlHttpRequest('GET', 'courseexam/' . $this->course->getSlug() . '/' . $this->exam->getId());

        $this->assertResponseIsSuccessful();
    }

    public function testCanUpdateInformation()
    {
        $this->createCloudStorageMock();

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

    private function createCloudStorageMock()
    {
        $storage = $this->createMock(StorageInterface::class);
        $folder = $this->createMock(FolderInterface::class);

        $folder->method('isExists')->willReturn(true);

        static::$container->set('test.' . StorageInterface::class, $storage);
        static::$container->set('test.' . FolderInterface::class, $folder);
    }
}
