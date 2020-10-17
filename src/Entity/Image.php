<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @Vich\Uploadable()
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="illumanga_image", fileNameProperty="ima_nom_fichier")
     */
    private $ima_fichier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ima_nom_fichier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Manga", inversedBy="images")
     * @ORM\JoinColumn(nullable=true)
     */
    private $manga;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Illustration",mappedBy="images", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false)
     */
    private $illustration;

    public function __construct()
    {
        $this->illustration = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImaNomFichier(): ?string
    {
        return $this->ima_nom_fichier;
    }

    public function setImaNomFichier(? string $ima_nom_fichier): self
    {
        $this->ima_nom_fichier = $ima_nom_fichier;

        return $this;
    }

    public function getManga(): ?Manga
    {
        return $this->manga;
    }

    public function setManga(?Manga $manga): self
    {
        $this->manga = $manga;

        return $this;
    }

    public function getIllustration(): ?Illustration
    {
        return $this->illustration;
    }

    public function addIllustration(?Illustration $illustration): self
    {
        if(!$this->illustration->contains($illustration))
        {
            $this->illustration[] = $illustration;
        }
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImaFichier(): ?File
    {
        return $this->ima_fichier;
    }

    /**
     * @param File|null $ima_fichier
     */
    public function setImaFichier(?File $ima_fichier): void
    {
        $this->ima_fichier = $ima_fichier;
    }


}
