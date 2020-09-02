<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\CourseExam;
use App\Entity\Exam;
use App\Factory\CourseExamFactory;
use App\Factory\GoogleDriveFileFactory;
use App\Request\QuestionUploadRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/courseexam/upload")
 */
class CourseExamUploadController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/{slug}/{exam}/question", methods={"POST"})
     * @ParamConverter("course", options={"mapping": {"slug": "slug"}})
     */
    public function updateQuestion(
        QuestionUploadRequest $request,
        CourseExamFactory $courseExamFactory,
        Course $course,
        Exam $exam,
        GoogleDriveFileFactory $fileFactory
    ) {
        $courseExam = $courseExamFactory->getOrCreate($course, $exam);

        $parentFolderPath = $courseExam->getFolderPath();

        $targetFileName = $this->generateQuestionFileName($courseExam);
        $file = $fileFactory->create($request->getFile(), $parentFolderPath, $targetFileName);

        $courseExam->setQuestionPath($file->getPath());

        $this->entityManager->flush();

        return $this->json(['uploaded' => true]);
    }

    private function generateQuestionFileName(CourseExam $courseExam): string
    {
        $exam = $courseExam->getExam();
        $examType = $exam->getType() === Exam::MID ? 'UTS' : 'UAS';
        $startYear = $exam->getStartYear();
        $endYear = $exam->getEndYear();
        $course = $courseExam->getCourse()->getTitle();

        $name = sprintf('Soal %s %s %s-%s.pdf', $examType, $course, $startYear, $endYear);

        return $name;
    }
}
