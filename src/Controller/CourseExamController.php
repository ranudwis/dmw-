<?php

namespace App\Controller;

use App\Repository\CourseExamRepository;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/courseexam")
 */
class CourseExamController extends Controller
{
    private $repository;

    public function __construct(CourseExamRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/{slug}", methods={"GET"})
     */
    public function index($slug)
    {
        $exams = $this->repository->getAllExamWithCourseSlug($slug);

        return $this->jsonResponse([
            'exams' => $exams
        ], [
            'includes' => ['id', 'type', 'semester', 'startYear', 'endYear']
        ]);
    }
}
