<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $catNom;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $catDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $catCouleur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatNom(): ?string
    {
        return $this->catNom;
    }

    public function setCatNom(?string $catNom): self
    {
        $this->catNom = $catNom;

        return $this;
    }

    public function getCatDescription(): ?string
    {
        return $this->catDescription;
    }

    public function setCatDescription(?string $catDescription): self
    {
        $this->catDescription = $catDescription;

        return $this;
    }

    public function getCatCouleur(): ?string
    {
        return $this->catCouleur;
    }

    public function setCatCouleur(?string $catCouleur): self
    {
        $this->catCouleur = $catCouleur;

        return $this;
    }


}
