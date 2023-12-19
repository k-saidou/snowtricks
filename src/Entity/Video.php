<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoRepository::class)
 */
class Video
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tricks", inversedBy="video", cascade={"persist"})
     * @ORM\ManyToOne(targetEntity=Tricks::class, inversedBy="videos")
     */
    private $trickVideo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVideo1(): ?string
    {
        return $this->video1;
    }

    public function setVideo1(?string $video1): self
    {
        $this->video1 = $video1;

        return $this;
    }

    public function getTrickVideo(): ?Tricks
    {
        return $this->trickVideo;
    }

    public function setTrickVideo(?Tricks $trickVideo): self
    {
        $this->trickVideo = $trickVideo;

        return $this;
    }
}
