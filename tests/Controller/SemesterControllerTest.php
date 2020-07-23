<?php

namespace App\Tests\Controller;

use App\Tests\TestCase;
use App\Repository\SemesterRepository;

class SemesterControllerTest extends TestCase
{
    private $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = static::$container->get(SemesterRepository::class);
    }

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

    public function testCanShowSemesterBySlug()
    {
        $semester = $this->repository->createQueryBuilder('s')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();

        $this->client->xmlHttpRequest('GET', 'semester/' . $semester->getSlug());

        $this->assertResponseIsSuccessful();
        $this->assertJsonStructure([
            'id',
            'type',
            'slug',
            'title',
            'courses'
        ]);
    }
}
