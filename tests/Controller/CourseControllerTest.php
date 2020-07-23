<?php

namespace App\Tests\Controller;

use App\Repository\CourseRepository;
use App\Tests\TestCase;

class CourseControllerTest extends TestCase
{
    private $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = static::$container->get(CourseRepository::class);
    }

    public function testCanShowCourseBySlug()
    {
        $course = $this->repository->createQueryBuilder('c')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();

        $this->client->xmlHttpRequest('GET', 'course/' . $course->getSlug());

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals([
            'id' => $course->getId(),
            'slug' => $course->getSlug(),
            'code' => $course->getCode(),
            'title' => $course->getTitle(),
            'credit' => $course->getCredit(),
            'description' => $course->getDescription(),
            'isVisible' => $course->getIsVisible(),
        ]);
    }
}
