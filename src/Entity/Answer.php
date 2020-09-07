<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CourseExam::class, inversedBy="answers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $courseExam;

    /**
     * @ORM\Column(type="smallint")
     */
    private $uploader;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uploaderName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourseExam(): ?CourseExam
    {
        return $this->courseExam;
    }

    public function setCourseExam(?CourseExam $courseExam): self
    {
        $this->courseExam = $courseExam;

        return $this;
    }

    public function getUploader(): ?int
    {
        return $this->uploader;
    }

    public function setUploader(int $uploader): self
    {
        $this->uploader = $uploader;

        return $this;
    }

    public function getUploaderName(): ?string
    {
        return $this->uploaderName;
    }

    public function setUploaderName(?string $uploaderName): self
    {
        $this->uploaderName = $uploaderName;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }
}
