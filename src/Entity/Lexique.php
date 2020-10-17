<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LexiqueRepository")
 */
class Lexique
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
    private $LexMot;

    /**
     * @ORM\Column(type="text")
     */
    private $LexDefinition;

    private $slug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLexMot(): ?string
    {
        return $this->LexMot;
    }

    public function setLexMot(string $LexMot): self
    {
        $this->LexMot = $LexMot;

        return $this;
    }

    public function getLexDefinition(): ?string
    {
        return $this->LexDefinition;
    }

    public function setLexDefinition(string $LexDefinition): self
    {
        $this->LexDefinition = $LexDefinition;

        return $this;
    }
    public function getSlug() : string
    {
        return isset($this->slug) ? $this->slug : $this->slug = (new Slugify())->slugify($this->LexMot);
    }
}
