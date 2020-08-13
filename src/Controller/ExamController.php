<?php

namespace App\Controller;

use App\Entity\Exam;
use App\Repository\ExamRepository;
use App\Service\Validator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("exam")
 */
class ExamController extends Controller
{
    private $repository;
    private $validator;
    private $entityManager;

    public function __construct(ExamRepository $repository, Validator $validator, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function index()
    {
        $exams = $this->repository->findAll();

        return $this->jsonResponse(compact('exams'), [
            'includes' => [ 'id', 'type', 'semester', 'startYear', 'endYear' ]
        ]);
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function create(Request $request)
    {
        $exam = new Exam();
        $exam->setType($request->get('type'));
        $exam->setSemester($request->get('semester'));
        $exam->setStartyear($request->get('startYear'));
        $exam->setEndYear($request->get('endYear'));

        $this->validator->validate($exam);

        $this->entityManager->persist($exam);
        $this->entityManager->flush();

        return $this->jsonResponse([ 'created' => true ]);
    }
}
