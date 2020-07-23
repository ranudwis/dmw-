<?php

namespace App\Controller;

use App\Repository\SemesterRepository;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/semester")
 */
class SemesterController extends Controller
{
    private $repository;

    public function __construct(SemesterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function index()
    {
        $semesters = $this->repository->findAll();

        return $this->jsonResponse(compact('semesters'), [
            'ignores' => ['courses']
        ]);
    }

    /**
     * @Route("/withCourses", methods={"GET"})
     */
    public function withCourses()
    {
        $semesters = $this->repository->getAllWithCourses();

        return $this->jsonResponse(compact('semesters'), [
            'ignores' => ['semester']
        ]);
    }
}
