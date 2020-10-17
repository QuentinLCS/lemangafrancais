<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivitesRepository")
 */
class Activites
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $actDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $actDescription;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="utiActivites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $actUtilisateur;

    public function __construct()
    {
        $this->actDate = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActDate(): string
    {
        return $this->actDate->format('d-m-Y H:i:s');
    }

    public function setActDate(\DateTimeInterface $actDate): self
    {
        $this->actDate = $actDate;

        return $this;
    }

    public function getActDescription(): ?string
    {
        return $this->actDescription;
    }

    public function setActDescription(string $actDescription): self
    {
        $this->actDescription = $actDescription;

        return $this;
    }

    public function getActUtilisateur(): ?Utilisateur
    {
        return $this->actUtilisateur;
    }

    public function setActUtilisateur(?Utilisateur $actUtilisateur): self
    {
        $this->actUtilisateur = $actUtilisateur;

        return $this;
    }
}
