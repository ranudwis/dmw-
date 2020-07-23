<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 */
class Article
{
    public const PUBLISHER_ADMIN = 1;
    public const PUBLISHER_VOLUNTEER = 2;
    public const PUBLISHER_ANONYMOUS = 3;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $volunteer;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="notnull:title")
     */
    private $title;

    /**
     * @Vich\UploadableField(mapping="webtutor_cover", fileNameProperty="cover.name")
     * @Assert\NotNull(message="notNull:coverfile")
     */
    private $coverFile;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     * @Assert\NotNull(message="notNull:cover")
     */
    private $cover;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull(message="notnull:article")
     */
    private $article;

    /**
     * @ORM\Column(type="datetime")
     */
    private $published;

    /**
     * @ORM\ManyToMany(targetEntity=Label::class, inversedBy="articles")
     * @Assert\NotNull(message="notnull:labels")
     * @Assert\Count(min=1, minMessage="min:labels")
     */
    private $labels;

    /**
     * @ORM\Column(type="datetime")
     */
    private $edited;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotNull(message="notnull:publisherType")
     * @Assert\Choice(choices={Article::PUBLISHER_ADMIN, Article::PUBLISHER_VOLUNTEER, Article::PUBLISHER_ANONYMOUS}, message="choice:publisherType")
     */
    private $publisherType;

    public function __construct()
    {
        $this->cover = new EmbeddedFile();
        $this->labels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVolunteer(): ?string
    {
        return $this->volunteer;
    }

    public function setVolunteer($volunteer): self
    {
        $this->volunteer = $volunteer;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setCoverFile(?File $coverFile = null)
    {
        $this->coverFile = $coverFile;

        if (null !== $coverFile) {
            $this->edited = new DateTime();
        }
    }

    public function getCoverFile(): ?File
    {
        return $this->coverFile;
    }

    public function getCover(): ?EmbeddedFile
    {
        return $this->cover;
    }

    public function setCover(?EmbeddedFile $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle($article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getPublished(): ?\DateTimeInterface
    {
        return $this->published;
    }

    public function setPublished($published): self
    {
        $this->published = $published;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function setPublishedValueOnPersist()
    {
        $this->setPublished(new DateTime());
    }

    /**
     * @return Collection|Label[]
     */
    public function getLabels(): Collection
    {
        return $this->labels;
    }

    public function addLabel(Label $label): self
    {
        if (!$this->labels->contains($label)) {
            $this->labels[] = $label;
        }

        return $this;
    }

    public function removeLabel(Label $label): self
    {
        if ($this->labels->contains($label)) {
            $this->labels->removeElement($label);
        }

        return $this;
    }

    public function getEdited(): ?\DateTimeInterface
    {
        return $this->edited;
    }

    public function setEdited($edited): self
    {
        $this->edited = $edited;

        return $this;
    }

    public function getPublisherType(): ?int
    {
        return $this->publisherType;
    }

    public function setPublisherType($publisherType): self
    {
        $this->publisherType = $publisherType;

        return $this;
    }
}
