<?php

namespace App\Entity;

use App\Repository\TricksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TricksRepository::class)
 * @UniqueEntity(
 *      fields={"nom"},
 *      errorPath="nom",
 *      message="Il existe déja un Tricks portant ce nom."
 * )
 */
class Tricks
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="id_tricks")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tricks")
     */
    private $id_user;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="id_tricks")
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity=Media::class, mappedBy="tricks", orphanRemoval=true)
     */
    private $media;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ajouter;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modifier;

    /**
     * @ORM\OneToMany(targetEntity=Video::class, mappedBy="trickVideo")
     */
    private $videos;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->videos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setIdTricks($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getIdTricks() === $this) {
                $commentaire->setIdTricks(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedia(Media $media): self
    {
        if (!$this->media->contains($media)) {
            $this->media[] = $media;
            $media->setTricks($this);
        }

        return $this;
    }

    public function removeMedia(Media $media): self
    {
        if ($this->media->removeElement($media)) {
            // set the owning side to null (unless already changed)
            if ($media->getTricks() === $this) {
                $media->setTricks(null);
            }
        }

        return $this;
    }

    public function getAjouter(): ?\DateTimeInterface
    {
        return $this->ajouter;
    }

    public function setAjouter(?\DateTimeInterface $ajouter): self
    {
        $this->ajouter = $ajouter;

        return $this;
    }

    public function getModifier(): ?\DateTimeInterface
    {
        return $this->modifier;
    }

    public function setModifier(?\DateTimeInterface $modifier): self
    {
        $this->modifier = $modifier;

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setTrickVideo($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getTrickVideo() === $this) {
                $video->setTrickVideo(null);
            }
        }

        return $this;
    }
}
