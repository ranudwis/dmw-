<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CourseRepository;
use App\Repository\SemesterRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/course")
 */
class CourseController extends Controller
{
    private $repository;
    private $semesterRepository;

    public function __construct(CourseRepository $repository, SemesterRepository $semesterRepository)
    {
        $this->repository = $repository;
        $this->semesterRepository = $semesterRepository;
    }

    /**
     * @Route("/{slug}", methods={"GET"})
     * @ParamConverter("course", options={"mapping": {"slug": "slug"}})
     */
    public function show(Course $course)
    {
        return $this->jsonResponse($course, [
            'ignores' => ['semester']
        ]);
    }
}
