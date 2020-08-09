<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 */
class Course
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Semester::class, inversedBy="courses")
     */
    private $semester;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="smallint")
     */
    private $credit;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVisible = true;

    /**
     * @ORM\OneToMany(targetEntity=CourseExam::class, mappedBy="course", orphanRemoval=true)
     */
    private $exams;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $folderPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $midExamFolderPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $endExamFolderPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $midAndEndExamPath;

    public function __construct()
    {
        $this->exams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSemester(): ?Semester
    {
        return $this->semester;
    }

    public function setSemester(?Semester $semester): self
    {
        $this->semester = $semester;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCredit(): ?int
    {
        return $this->credit;
    }

    public function setCredit(int $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    /**
     * @return Collection|CourseExam[]
     */
    public function getExams(): Collection
    {
        return $this->exams;
    }

    public function addExam(CourseExam $exam): self
    {
        if (!$this->exams->contains($exam)) {
            $this->exams[] = $exam;
            $exam->setCourse($this);
        }

        return $this;
    }

    public function removeExam(CourseExam $exam): self
    {
        if ($this->exams->contains($exam)) {
            $this->exams->removeElement($exam);
            // set the owning side to null (unless already changed)
            if ($exam->getCourse() === $this) {
                $exam->setCourse(null);
            }
        }

        return $this;
    }

    public function getFolderPath(): ?string
    {
        return $this->folderPath;
    }

    public function setFolderPath(?string $folderPath): self
    {
        $this->folderPath = $folderPath;

        return $this;
    }

    public function getMidExamFolderPath(): ?string
    {
        return $this->midExamFolderPath;
    }

    public function setMidExamFolderPath(?string $midExamFolderPath): self
    {
        $this->midExamFolderPath = $midExamFolderPath;

        return $this;
    }

    public function getEndExamFolderPath(): ?string
    {
        return $this->endExamFolderPath;
    }

    public function setEndExamFolderPath(?string $endExamFolderPath): self
    {
        $this->endExamFolderPath = $endExamFolderPath;

        return $this;
    }

    public function getMidAndEndExamPath(): ?string
    {
        return $this->midAndEndExamPath;
    }

    public function setMidAndEndExamPath(?string $midAndEndExamPath): self
    {
        $this->midAndEndExamPath = $midAndEndExamPath;

        return $this;
    }
}
