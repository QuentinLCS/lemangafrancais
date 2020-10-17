<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScenarioRepository")
 */
class Scenario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sce_titre;

    /**
     * @ORM\Column(type="text")
     */
    private $sce_contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sce_date_creation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="utiScenarios")
     */
    private $utilisateurs;

    public function __construct()
    {
        $this->sce_date_creation= new \DateTime('now',new \DateTimeZone('Europe/Paris'));
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSceTitre(): ?string
    {
        return $this->sce_titre;
    }

    public function setSceTitre(string $sce_titre): self
    {
        $this->sce_titre = $sce_titre;

        return $this;
    }

    public function getSceContenu(): ?string
    {
        return $this->sce_contenu;
    }

    public function setSceContenu(string $sce_contenu): self
    {
        $this->sce_contenu = $sce_contenu;

        return $this;
    }

    public function getSceDateCreation(): String
    {
        $date="Pas de date rentrée";
        if($this->sce_date_creation!=null)
        {
            $date=$this->getFormattedDate();
        }
        return $date;
    }

    public function setSceDateCreation(\DateTimeInterface $sce_date_creation): self
    {
        $this->sce_date_creation = $sce_date_creation;
        return $this;
    }

    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    public function addUtilisateurs(?Utilisateur $utilisateur): self
    {
        if(!$this->utilisateurs->contains($utilisateur))
        {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->addUtiScenario($this);
        }
        return $this;
    }
    public function getFormattedDate(): ?string
    {
        setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
        return strftime("%d %B %G",$this->sce_date_creation->getTimestamp());
    }
}
