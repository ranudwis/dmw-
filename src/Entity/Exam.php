<?php

namespace App\Entity;

use App\Repository\ExamRepository;
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

    public function getId(): ?int
    {
        return $this->id;
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
}
