<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatureRepository")
 */
class Candidature
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="candidatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recrutement", inversedBy="candidatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recrutement;

    /**
     * @ORM\Column(type="datetime")
     */
    private $canDate;

    /**
     * @ORM\Column(type="text")
     */
    private $canContenu;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $canEtat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        $utilisateur->addCandidature($this);

        return $this;
    }

    public function getRecrutement(): ?Recrutement
    {
        return $this->recrutement;
    }

    public function setRecrutement(?Recrutement $recrutement): self
    {
        $this->recrutement = $recrutement;

        return $this;
    }

    public function getCanDate(): ?\DateTimeInterface
    {
        return $this->canDate;
    }

    public function getCanDateString(): ?String
    {
        $resultat = 'New';

        if ($this->canDate !== null)
            $resultat = $this->canDate->format('d-m-Y à H:i:s');

        return $resultat;
    }

    public function setCanDate(\DateTimeInterface $canDate): self
    {
        $this->canDate = $canDate;

        return $this;
    }

    public function getCanContenu(): ?string
    {
        return $this->canContenu;
    }

    public function setCanContenu(string $canContenu): self
    {
        $this->canContenu = $canContenu;

        return $this;
    }

    public function getCanEtat(): ?string
    {
        return $this->canEtat;
    }

    public function setCanEtat(?string $canEtat): self
    {
        $this->canEtat = $canEtat;

        return $this;
    }
}
