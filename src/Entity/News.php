<?php

namespace App\Entity;

use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 * @Vich\Uploadable()
 */
class News
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
    private $newsTitre;

    /**
     * @ORM\Column(type="text")
     */
    private $newsContenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $newsDateCreation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $newsDateDerniereModif;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="utiNews")
     */
    private $utilisateurs;



    /**
     * @var File|null
     * @Assert\Image(
     *     mimeTypes="image/jpeg"
     * )
     * @Vich\UploadableField(mapping="news_image", fileNameProperty="newsPhotoNomFichier")
     */
    private $newsPhotoFichier;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $newsPhotoNomFichier;


    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->newsDateCreation= new \DateTime('now',new \DateTimeZone('Europe/Paris'));
    }


    /**
     * @return File|null
     */
    public function getNewsPhotoFichier(): ?File
    {
        return $this->newsPhotoFichier;
    }

    /**
     * @param File|null $newsPhotoFichier
     * @return News
     * @throws \Exception
     */
    public function setNewsPhotoFichier(?File $newsPhotoFichier): News
    {
        $this->newsPhotoFichier = $newsPhotoFichier;
        if($this->newsPhotoFichier instanceof UploadedFile)
            $this->newsDateDerniereModif = new \DateTime('now',new DateTimeZone('Europe/Paris'));

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewsPhotoNomFichier(): ?string
    {
        return $this->newsPhotoNomFichier;
    }

    /**
     * @param string|null $newsPhotoNomFichier
     */
    public function setNewsPhotoNomFichier(?string $newsPhotoNomFichier): void
    {
        $this->newsPhotoNomFichier = $newsPhotoNomFichier;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewsTitre(): ?string
    {
        return $this->newsTitre;
    }

    public function setNewsTitre(string $new_titre): self
    {
        $this->newsTitre = $new_titre;

        return $this;
    }

    public function getNewsContenu(): ?string
    {
        return $this->newsContenu;
    }

    public function setNewsContenu(string $news_contenu): self
    {
        $this->newsContenu = $news_contenu;

        return $this;
    }

    public function getNewsDateCreation(): String
    {
        $date = "Pas de date rentrée";
        if($this->newsDateCreation!=null)
        {
            $date=$this->getFormattedDate($this->newsDateCreation);
        }
        return $date;
    }

    public function setNewsDateCreation(\DateTimeInterface $new_date_creation): self
    {
        $this->newsDateCreation = $new_date_creation;

        return $this;
    }

    public function getUtilisateurs(): ?ArrayCollection
    {
        return $this->utilisateurs;
    }
    public function getFormattedDate(\DateTime $date): ?string
    {
        setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
        return strftime("%d %B %G",$date->getTimestamp());
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur))
            $this->utilisateurs->add($utilisateur);

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur))
            $this->utilisateurs->removeElement($utilisateur);

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getNewsDateDerniereModif(): String
    {
        $date = "Pas de date rentrée";

        if( $this->newsDateDerniereModif !== null )
            $date = $this->getFormattedDate($this->newsDateDerniereModif );

        return $date;
    }

    public function setNewsDateDerniereModif(\DateTimeInterface $newsDateDerniereModif): self
    {
        $this->newsDateDerniereModif = $newsDateDerniereModif;

        return $this;
    }
}
