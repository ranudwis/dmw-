<?php

namespace App\Entity;

use App\Repository\CourseExamRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseExamRepository::class)
 */
class CourseExam
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Exam::class, inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exam;

    /**
     * @ORM\ManyToOne(targetEntity=Course::class, inversedBy="exams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $course;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $information;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $folderPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $questionPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $questionAndAnswerPath;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExam(): ?Exam
    {
        return $this->exam;
    }

    public function setExam(?Exam $exam): self
    {
        $this->exam = $exam;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function setInformation(?string $information): self
    {
        $this->information = $information;

        return $this;
    }

    public function getFolderPath(): ?string
    {
        return $this->folderPath;
    }

    public function setFolderPath(string $folderPath): self
    {
        $this->folderPath = $folderPath;

        return $this;
    }

    public function getQuestionPath(): ?string
    {
        return $this->questionPath;
    }

    public function getHasQuestion(): bool
    {
        return ! is_null($this->questionPath);
    }

    public function setQuestionPath(?string $questionPath): self
    {
        $this->questionPath = $questionPath;

        return $this;
    }

    public function getQuestionAndAnswerPath(): ?string
    {
        return $this->questionAndAnswerPath;
    }

    public function getHasQuestionAndAnswer(): bool
    {
        return ! is_null($this->questionAndAnswerPath);
    }

    public function setQuestionAndAnswerPath(?string $questionAndAnswerPath): self
    {
        $this->questionAndAnswerPath = $questionAndAnswerPath;

        return $this;
    }
}
