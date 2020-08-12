<?php

namespace App\Factory;

use App\Entity\Course;
use App\Entity\CourseExam;
use App\Entity\Exam;
use App\Entity\Semester;
use App\Service\CloudStorage\Folder\FolderInterface;

class CourseExamFactory
{
    private const MID_STRING = 'Ujian Tengah Semester';
    private const END_STRING = 'Ujian Akhir Semester';

    private $folder;
    private $courseFolder;
    private $courseExamFolder;
    private $examFolder;

    public function __construct(
        FolderInterface $folder,
        FolderInterface $courseFolder,
        FolderInterface $courseExamFolder,
        FolderInterface $examFolder
    ) {
        $this->folder = $folder;
        $this->courseFolder = $courseFolder;
        $this->courseExamFolder = $courseExamFolder;
        $this->examFolder = $examFolder;
    }

    public function create(Course $course, Exam $exam): CourseExam
    {
        $this->checkOrCreateCourseExamFolder($course, $exam);

        $courseExam = new CourseExam();
        $courseExam->setCourse($course);
        $courseExam->setExam($exam);
        $this->folder->create($this->generateFolderName($course, $exam), $this->courseExamFolder);
        $courseExam->setFolderPath($this->folder->getPath());

        return $courseExam;
    }

    private function generateFolderName(Course $course, Exam $exam)
    {
        $type = $exam->getType() === Exam::MID ? 'Tengah' : 'Akhir';
        $title = $course->getTitle();
        $startYear = $exam->getStartyear();
        $endYear = $exam->getEndYear();

        return sprintf('Ujian %s Semester %s %s/%s', $type, $title, $startYear, $endYear);
    }

    /**
     * @SuppressWarnings(PHPMD.ElseExpression)
     */
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

            if ($exam->getType() === Exam::MID) {
                $course->setMidExamFolderPath($this->courseExamFolder->getPath());
            } else {
                $course->setEndExamFolderPath($this->courseExamFolder->getPath());
            }
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

            $course->setFolderPath($this->courseFolder->getPath());
        }
    }
}
