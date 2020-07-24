<?php

namespace App\Tests\Controller;

use App\Entity\Exam;
use App\Entity\Semester;
use App\Repository\ExamRepository;
use App\Tests\TestCase;

class ExamControllerTest extends TestCase
{
    private $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = static::$container->get(ExamRepository::class);
    }

    public function testCanCreateExam()
    {
        $data = [
            'type' => Exam::END,
            'semester' => Semester::EVEN,
            'startYear' => date('Y'),
            'endYear' => date('Y') + 1
        ];

        $this->client->xmlHttpRequest('POST', 'exam', $data);

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals([ 'created' => true ]);
        $this->assertRepositoryHas($this->repository, $data);
    }

    public function testCanIndexExam()
    {
        $this->client->xmlHttpRequest('GET', 'exam');

        $this->assertResponseIsSuccessful();
        $this->assertJsonStructure([ 'exams' ]);
    }
}
