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

    public function __construct(
        CourseExamRepository $repository,
        EntityManagerInterface $entityManager,
        Validator $validator
    ) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->validator = $validator;
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
        $courseExam = $this->repository->findOneBy([
            'course' => $course,
            'exam' => $exam
        ]);

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
        $courseExam = $this->getOrCreateCourseExam($course, $exam);

        $courseExam->setInformation($request->get('information'));

        $this->validator->validate($courseExam);

        $this->entityManager->flush();

        return $this->json(['updated' => true]);
    }

    /**
     * @Route("/{slug}/{exam}/question", methods={"PUT"})
     * @ParamConverter("course", options={"mapping": {"slug": "slug"}})
     */
    public function updateQuestion(
        Request $request,
        Course $course,
        Exam $exam,
        GoogleDriveFileFactory $factory
    ) {
        $contentLength = $request->get('contentLength');

        $this->validateUpdateQuestionRequest($contentLength);

        $courseExam = $this->getOrCreateCourseExam($course, $exam);

        $parentFolderPath = $courseExam->getFolderPath();

        $name = $this->generateQuestionFileName($courseExam);
        $upload = $factory->create($name, $contentLength, 'application/pdf', $parentFolderPath);

        $courseExam->setQuestionPath($upload['file']->getPath());

        return $this->json([
            'uploadUrl' => $upload['url']
        ]);
    }

    private function getOrCreateCourseExam(
        Course $course,
        Exam $exam,
        CourseExamFactory $factory
    ): CourseExam {
        $courseExam = $this->repository->findOneBy([
            'course' => $course,
            'exam' => $exam
        ]);

        if (is_nulL($courseExam)) {
            $courseExam = $factory->create($course, $exam);

            $this->entityManager->persist($courseExam);
        }

        return $courseExam;
    }

    private function validateUpdateQuestionRequest(string $contentLength): void
    {
        $notNull = new Assert\NotNull();
        $notNull->message = 'notnull:contentLength';
        $positive = new Assert\Positive();
        $positive->message = 'positive:contentLength';

        $assertion = [
            $notNull,
            $positive
        ];

        $this->validator->validateWithConstraint($contentLength, $assertion);
    }

    private function generateQuestionFileName(CourseExam $courseExam): string
    {
        $exam = $courseExam->getExam();
        $examType = $exam->getType() === Exam::MID ? 'UTS' : 'UAS';
        $startYear = $exam->getStartYear();
        $endYear = $exam->getEndYear();
        $course = $courseExam->getCourse()->getTitle();

        $name = sprintf('Soal %s %s %s-%s', $examType, $startYear, $endYear, $course);

        return $name;
    }
}
