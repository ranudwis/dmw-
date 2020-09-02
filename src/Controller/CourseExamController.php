<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\CourseExam;
use App\Entity\Exam;
use App\Factory\CourseExamFactory;
use App\Factory\GoogleDriveFileFactory;
use App\Repository\CourseExamRepository;
use App\Service\Validator;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Route("/courseexam")
 */
class CourseExamController extends Controller
{
    private $repository;
    private $entityManager;
    private $validator;
    private $factory;

    public function __construct(
        CourseExamRepository $repository,
        EntityManagerInterface $entityManager,
        Validator $validator,
        CourseExamFactory $factory
    ) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->validator = $validator;
        $this->factory = $factory;
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

    /**
     * @Route("/{slug}/{exam}", methods={"GET"})
     * @ParamConverter("course", options={"mapping": {"slug": "slug"}})
     */
    public function show(Course $course, Exam $exam)
    {
        $courseExam = $this->factory->getOrCreate($course, $exam);

        return $this->jsonResponse($courseExam, [
            'includes' => [
                'id',
                'information',
                'folderPath',
                'questionPath',
                'questionAndAnswerPath',
                'exam' => [
                    'typeString',
                    'startYear',
                    'endYear'
                ]
            ]
        ]);
    }

    /**
     * @Route("/{slug}/{exam}/information", methods={"PUT"})
     * @ParamConverter("course", options={"mapping": {"slug": "slug"}})
     */
    public function updateInformation(
        Request $request,
        Course $course,
        Exam $exam
    ) {
        $courseExam = $this->factory->getOrCreate($course, $exam);

        $courseExam->setInformation($request->get('information'));

        $this->validator->validate($courseExam);

        $this->entityManager->flush();

        return $this->json(['updated' => true]);
    }
}
