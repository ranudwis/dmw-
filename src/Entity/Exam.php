<?php

namespace App\Entity;

use App\Repository\ExamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ExamRepository::class)
 */
class Exam
{
    public const MID = 0;
    public const END = 1;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotNull(message="notnull:type")
     * @Assert\Choice(choices={Exam::MID, Exam::END}, message="choice:type")
     */
    private $type;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Choice(choices={App\Entity\Semester::ODD, App\Entity\Semester::EVEN}, message="choice:semester")
     */
    private $semester;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="notnull:startYear")
     */
    private $startYear;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="notnull:endYear")
     */
    private $endYear;

    /**
     * @ORM\OneToMany(targetEntity=CourseExam::class, mappedBy="exam", orphanRemoval=true)
     */
    private $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeString(): ?string
    {
        return $this->type === self::MID ? 'mid' : 'end';
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSemester(): ?int
    {
        return $this->semester;
    }

    public function setSemester(int $semester): self
    {
        $this->semester = $semester;

        return $this;
    }

    public function getStartYear(): ?string
    {
        return $this->startYear;
    }

    public function setStartYear(string $startYear): self
    {
        $this->startYear = $startYear;

        return $this;
    }

    public function getEndYear(): ?string
    {
        return $this->endYear;
    }

    public function setEndYear(string $endYear): self
    {
        $this->endYear = $endYear;

        return $this;
    }

    /**
     * @return Collection|CourseExam[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function getDetail()
    {
        return $this->courses[0];
    }

    public function addCourse(CourseExam $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setExam($this);
        }

        return $this;
    }

    public function removeCourse(CourseExam $course): self
    {
        if ($this->courses->contains($course)) {
            $this->courses->removeElement($course);
            // set the owning side to null (unless already changed)
            if ($course->getExam() === $this) {
                $course->setExam(null);
            }
        }

        return $this;
    }
}
