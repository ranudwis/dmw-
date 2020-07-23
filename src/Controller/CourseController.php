<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Repository\SemesterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/course")
 */
class CourseController extends AbstractController
{
    private $repository;
    private $semesterRepository;

    public function __construct(CourseRepository $repository, SemesterRepository $semesterRepository)
    {
        $this->repository = $repository;
        $this->semesterRepository = $semesterRepository;
    }
}
