<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MangaRepository")
 */
class Manga
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
    private $man_titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $man_contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $man_date_creation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="manga", orphanRemoval=true,cascade={"persist", "remove" })
     */
    private $images;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="utiMangas")
     */
    private $utilisateurs;


    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->man_date_creation=new \DateTime('now',new \DateTimeZone('Europe/Paris'));
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManTitre(): ?string
    {
        return $this->man_titre;
    }

    public function setManTitre(string $man_titre): self
    {
        $this->man_titre = $man_titre;

        return $this;
    }

    public function getManContenu(): ?string
    {
        return $this->man_contenu;
    }

    public function setManContenu(?string $man_contenu): self
    {
        $this->man_contenu = $man_contenu;

        return $this;
    }

    public function getManDateCreation(): String
    {
        $date="Pas de date rentrée";
        if($this->man_date_creation!=null)
        {
            $date=$this->getFormattedDate();
        }
        return $date;
    }

    public function setManDateCreation(\DateTimeInterface $man_date_creation): self
    {
        $this->man_date_creation = $man_date_creation;

        return $this;
    }

    /**
     * @return Collection|image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(?UploadedFile $file): self
    {
        $image = new Image();
        $image->setImaFichier($file);
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setManga($this);
        }
        return $this;
    }

    public function removeImage(image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getManga() === $this) {
                $image->setManga(null);
            }
        }

        return $this;
    }

    public function getUtilisateur()
    {
        return $this->utilisateurs;
    }

    public function addUtilisateurs(?Utilisateur $utilisateur): self
    {
        if(!$this->utilisateurs->contains($utilisateur))
        {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->addUtiManga($this);
        }
        return $this;
    }
    public function getFormattedDate(): ?string
    {
        setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
        return strftime("%d %B %G",$this->man_date_creation->getTimestamp());
    }
}
