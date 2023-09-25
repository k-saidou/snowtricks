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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageUne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video2;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->media = new ArrayCollection();
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

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

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

    public function getImageUne(): ?string
    {
        return $this->imageUne;
    }

    public function setImageUne(?string $imageUne): self
    {
        $this->imageUne = $imageUne;

        return $this;
    }

    public function getVideo2(): ?string
    {
        return $this->video2;
    }

    public function setVideo2(?string $video2): self
    {
        $this->video2 = $video2;

        return $this;
    }
}
