<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langues
 *
 * @ORM\Entity(repositoryClass="App\Repository\LanguesRepository")
 */
class Langues
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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lanNom;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $lanAbreviation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanNom(): ?string
    {
        return $this->lanNom;
    }

    public function setLanNom(?string $lanNom): self
    {
        $this->lanNom = $lanNom;

        return $this;
    }

    public function getLanAbreviation(): ?string
    {
        return $this->lanAbreviation;
    }

    public function setLanAbreviation(?string $lanAbreviation): self
    {
        $this->lanAbreviation = $lanAbreviation;

        return $this;
    }


}
