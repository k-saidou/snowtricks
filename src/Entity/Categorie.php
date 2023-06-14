<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Tricks::class, mappedBy="categorie")
     */
    private $id_tricks;

    public function __construct()
    {
        $this->id_tricks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Tricks>
     */
    public function getIdTricks(): Collection
    {
        return $this->id_tricks;
    }

    public function addIdTrick(Tricks $idTrick): self
    {
        if (!$this->id_tricks->contains($idTrick)) {
            $this->id_tricks[] = $idTrick;
            $idTrick->setCategorie($this);
        }

        return $this;
    }

    public function removeIdTrick(Tricks $idTrick): self
    {
        if ($this->id_tricks->removeElement($idTrick)) {
            // set the owning side to null (unless already changed)
            if ($idTrick->getCategorie() === $this) {
                $idTrick->setCategorie(null);
            }
        }

        return $this;
    }
}
