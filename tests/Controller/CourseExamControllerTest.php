<?php

namespace App\Tests\Controller;

use App\Entity\CourseExam;
use App\Factory\CourseExamFactory;
use App\Factory\GoogleDriveFileFactory;
use App\Repository\CourseExamRepository;
use App\Repository\CourseRepository;
use App\Repository\ExamRepository;
use App\Service\CloudStorage\File\GoogleDriveFile;
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

        $this->createFactoryMock();
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

    public function testCanUpdateQuestion()
    {
        $url = sprintf('courseexam/%s/%s/question', $this->course->getSlug(), $this->exam->getId());
        $pdf = $this->createUploadedPdf();

        $this->client->xmlHttpRequest('PUT', $url, [
            'contentLength' => $pdf->getSize()
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals([
            'uploadUrl' => 'upload'
        ]);
    }

    private function createFactoryMock()
    {
        $courseExam = new CourseExam();
        $courseExam->setFolderPath('');
        $courseExam->setExam($this->exam);
        $courseExam->setCourse($this->course);

        $factory = $this->createMock(CourseExamFactory::class);

        $factory->method('create')->willReturn($courseExam);

        static::$container->set('test.' . CourseExamFactory::class, $factory);

        $fileFactory = $this->createMock(GoogleDriveFileFactory::Class);
        $file = $this->createMock(GoogleDriveFile::class);

        $fileFactory->method('create')->willReturn([
            'url' => 'upload',
            'file' => $file
        ]);

        static::$container->set('test.' . GoogleDriveFileFactory::class, $fileFactory);
    }
}
