<?php

namespace App\Factory;

use App\Entity\Course;
use App\Entity\CourseExam;
use App\Entity\Exam;
use App\Entity\Semester;
use App\Service\CloudStorage\Folder\FolderInterface;

class CourseExamFactory
{
    private const MID_STRING = 'UTS';
    private const END_STRING = 'UAS';

    private $folder;
    private $courseFolder;
    private $courseExamFolder;

    public function __construct(
        FolderInterface $folder,
        FolderInterface $courseFolder,
        FolderInterface $courseExamFolder
    ) {
        $this->folder = $folder;
        $this->courseFolder = $courseFolder;
        $this->courseExamFolder = $courseExamFolder;
    }

    public function create(Course $course, Exam $exam): CourseExam
    {
        $this->checkOrCreateCourseExamFolder($course, $exam);

        $courseExam = new CourseExam();
        $courseExam->setCourse($course);
        $courseExam->setExam($exam);
        $this->folder->create($this->generateFolderName($exam), $this->courseFolder);
        $courseExam->setFolderPath($this->folder->getPath());

        return $courseExam;
    }

    private function generateFolderName(Exam $exam)
    {
        $semester = $exam->getSemester() === Semester::EVEN ? 'Genap' : 'Ganjil';
        $startYear = $exam->getStartyear();
        $endYear = $exam->getEndYear();

        return sprintf('Ujian %s Semester %s/%s', $semester, $startYear, $endYear);
    }

    private function checkOrCreateCourseExamFolder(Course $course, Exam $exam)
    {
        $this->checkOrCreateCourseFolder($course);

        $folderPath = $exam->getType() === Exam::MID
            ? $course->getMidExamFolderPath()
            : $course->getEndExamFolderPath();

        if ($folderPath) {
            $this->courseExamFolder->setPath($folderPath);
        }

        if (! $this->courseExamFolder->isExists()) {
            $title = $exam->getType() === Exam::MID ? self::MID_STRING : self::END_STRING;

            $this->courseExamFolder->create($title, $this->courseFolder);
        }
    }

    private function checkOrCreateCourseFolder(Course $course)
    {
        $folderPath = $course->getFolderPath();

        if ($folderPath) {
            $this->courseFolder->setPath($folderPath);
        }

        if (! $this->courseFolder->isExists()) {
            $this->courseFolder->create($course->getTitle());
        }
    }
}
