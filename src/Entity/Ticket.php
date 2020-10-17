<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=250)
     */
    private $sujet;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $type;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="utiTickets")
     */
    private $utilisateur;

    /**
     * @return mixed
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * @param mixed $utilisateur
     * @return Ticket
     */
    public function setUtilisateur($utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }
}
