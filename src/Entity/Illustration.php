<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IllustrationRepository")
 */
class Illustration
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
    private $ill_titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ill_contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ill_date_creation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Image", inversedBy="illustration",cascade={"persist", "remove" })
     */
    private $images;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="utiIllustrations")
     */
    private $utilisateurs;

    /**
     * @ORM\Column(type="datetime")
     */
    private $derniere_modification;

    public function __construct()
    {
        $this->ill_date_creation=new \DateTime('now',new \DateTimeZone('Europe/Paris'));
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIllTitre(): ?string
    {
        return $this->ill_titre;
    }

    public function setIllTitre(string $ill_titre): self
    {
        $this->ill_titre = $ill_titre;

        return $this;
    }

    public function getIllContenu(): ?string
    {
        return $this->ill_contenu;
    }

    public function setIllContenu(?string $ill_contenu): self
    {
        $this->ill_contenu = $ill_contenu;

        return $this;
    }

    public function getIllDateCreation(): String
    {
        $date="Pas de date de rentrée";
        if($this->ill_date_creation!=null)
        {
            $date=$this->getFormattedDate();
        }
        return $date;
    }

    public function setIllDateCreation(\DateTimeInterface $ill_date_creation): self
    {
        $this->ill_date_creation = $ill_date_creation;

        return $this;
    }

    /**
     * @return Collection|image[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param UploadedFile $file
     * @return $this
     * @throws \Exception
     */
    public function addImage(?File $file): self
    {
        $image = new Image();
        $image->setImaFichier($file);
        $image->addIllustration($this);
        $this->images=$image;
        if($file instanceof UploadedFile)
        {
            $this->derniere_modification = new \DateTime('now');
        }
        return $this;
    }

    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function removeImage(UploadedFile $file): self
    {
        $image = new Image();
        $image->setImaFichier($file);
        if($this->images==$image)
        {
            $this->$image=null;
        }
        return $this;
    }

    /**
     * @return ArrayCollection|null
     */
    public function getUtilisateur()
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(?Utilisateur $utilisateur): self
    {
        if(!$this->utilisateurs->contains($utilisateur))
        {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->addUtiIllustration($this);
        }
        return $this;
    }
    public function getFormattedDate(): ?string
    {
        setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
        return strftime("%d %B %G",$this->ill_date_creation->getTimestamp());
    }

    public function getDerniereModification(): ?\DateTimeInterface
    {
        return $this->derniere_modification;
    }

    public function setDerniereModification(\DateTimeInterface $derniere_modification): self
    {
        $this->derniere_modification = $derniere_modification;

        return $this;
    }
}
