<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Style
 *
 * @ORM\Entity(repositoryClass="App\Repository\StyleRepository")
 */
class Style
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
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $styNom;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $styDescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStyNom(): ?string
    {
        return $this->styNom;
    }

    public function setStyNom(?string $styNom): self
    {
        $this->styNom = $styNom;

        return $this;
    }

    public function getStyDescription(): ?string
    {
        return $this->styDescription;
    }

    public function setStyDescription(?string $styDescription): self
    {
        $this->styDescription = $styDescription;

        return $this;
    }


}
