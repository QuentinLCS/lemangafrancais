<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecrutementRepository")
 * @Vich\Uploadable
 */
class Recrutement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="recrutements")
     */
    private $utilisateur;

    /**
     * @var File|null
     *
     * @Assert\Image(
     *     mimeTypes="image/jpeg"
     * )
     * @Vich\UploadableField(mapping="recruitments_image", fileNameProperty="recImageNomFichier")
     */
    private $recImageFichier;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recImageNomFichier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="recrutements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $recDate;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $recDuree;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $recContenu;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $recResume;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $recDerniereMAJ;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Candidature", mappedBy="recrutement", orphanRemoval=true)
     */
    private $candidatures;

    public function __construct()
    {
        $this->recDerniereMAJ = new \DateTime();
        $this->candidatures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug() : string
    {
        return isset($this->slug) ? $this->slug : $this->slug = (new Slugify())->slugify($this->role->getRolNom());
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getRecDate(): ?\DateTimeInterface
    {
        return $this->recDate;
    }

    public function getRecDateString(): string
    {
        $resultat = 'Aucun';

        if ($this->recDate !== null)
            $resultat = $this->recDate->format('d-m-Y à H:i:s');

        return $resultat;
    }

    public function setRecDate(?\DateTimeInterface $recDate): self
    {
        $this->recDate = $recDate;

        return $this;
    }

    public function setRecDateString(?string $recDate): self
    {
        try {
            $this->recDate = new DateTime($recDate);
        } catch (\Exception $e) {
        }

        return $this;
    }

    public function getRecDuree(): ?int
    {
        return $this->recDuree;
    }

    public function getRecDateFinString()
    {
        $resultat = 'Aucun';

        if ($this->recDuree !== null)
            $resultat = $this->getRecDateFin()->format('d-m-Y à H:i:s');

        return $resultat;
    }

    public function getRecDateFin()
    {
        $resultat = null;

        if ($this->recDuree !== null)
            $resultat = strtotime("+ $this->recDuree day", $this->recDate->getTimestamp());

        return (new DateTime())->setTimestamp($resultat);
    }

    public function setRecDuree(?int $recDuree): self
    {
        $this->recDuree = $recDuree;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecContenu()
    {
        return $this->recContenu;
    }

    /**
     * @param mixed $recContenu
     * @return Recrutement
     */
    public function setRecContenu($recContenu)
    {
        $this->recContenu = $recContenu;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecResume(): ?string
    {
        return $this->recResume;
    }

    /**
     * @param string|null $recResume
     * @return Recrutement
     */
    public function setRecResume(?string $recResume): Recrutement
    {
        $this->recResume = $recResume;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getRecImageFichier(): ?File
    {
        return $this->recImageFichier;
    }

    /**
     * @param File|null $recImageFichier
     * @return Recrutement
     * @throws \Exception
     */
    public function setRecImageFichier(?File $recImageFichier): Recrutement
    {
        $this->recImageFichier = $recImageFichier;

        if (null !== $recImageFichier) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->recDerniereMAJ = new \DateTime();
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecImageNomFichier(): ?string
    {
        return $this->recImageNomFichier;
    }

    /**
     * @param string|null $recImageNomFichier
     * @return Recrutement
     */
    public function setRecImageNomFichier(?string $recImageNomFichier): Recrutement
    {
        $this->recImageNomFichier = $recImageNomFichier;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getRecDerniereMAJ(): DateTime
    {
        return $this->recDerniereMAJ;
    }

    /**
     * @param DateTime $recDerniereMAJ
     * @return Recrutement
     */
    public function setRecDerniereMAJ(DateTime $recDerniereMAJ): Recrutement
    {
        $this->recDerniereMAJ = $recDerniereMAJ;
        return $this;
    }

    /**
     * @return Collection|Candidature[]
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidature $candidature): self
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures[] = $candidature;
            $candidature->setRecrutement($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): self
    {
        if ($this->candidatures->contains($candidature)) {
            $this->candidatures->removeElement($candidature);
            // set the owning side to null (unless already changed)
            if ($candidature->getRecrutement() === $this) {
                $candidature->setRecrutement(null);
            }
        }

        return $this;
    }

    public function getRecEtat(): string
    {
        $resultat = 'Fermé';

        if ($this->recDate !== null)
            if ( $this->recDate > (new DateTime()) )
                $resultat = 'Ouverture le '.$this->recDate->format('d-m-Y à H:i:s');
            else if ($this->getRecDateFin() > (new DateTime()))
                $resultat = 'Ouvert';

        return $resultat;
    }
}
