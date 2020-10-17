<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Serializable;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Utilisateur
 *
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @Vich\Uploadable
 */
class Utilisateur implements UserInterface, Serializable
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40, nullable=false, unique=true)
     * @Assert\Length(min=3)
     * @ORM\Id()
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(type="string", length=36, nullable=true)
     */
    private $utiIdParrainer;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Role", inversedBy="utilisateurs")
     * @ORM\JoinTable(name="endosser")
     */
    private $utiRoles;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Scenario", inversedBy="utilisateurs")
     */
    private $utiScenarios;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    private $lanId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\Email()
     */
    private $utiMail;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=12, nullable=true)
     * @Assert\Length(min=10, max=12)
     */
    private $utiTelephone;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $utiNaissance;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $utiInscription;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $utiDerniereSession;

    /**
     * @var bool|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $utiConnecte;

    /**
     * @var File|null
     *
     * @Assert\Image(
     *     mimeTypes="image/jpeg"
     * )
     * @Vich\UploadableField(mapping="users_avatar_image", fileNameProperty="utiAvatarNomFichier")
     */
    private $utiAvatarFichier;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $utiAvatarNomFichier;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $utiTokens;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $utiBiographie;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=300, nullable=false)
     */
    private $utiMdp;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $utiIp;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $utiNotif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $utiDerniereMAJ;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Activites", mappedBy="actUtilisateur", orphanRemoval=true)
     */
    private $utiActivites;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="App\Entity\News", mappedBy="utilisateurs")
     */
    private $utiNews;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recrutement", mappedBy="utilisateur")
     */
    private $recrutements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Candidature", mappedBy="utilisateur", orphanRemoval=true)
     */
    private $candidatures;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Manga", mappedBy="utilisateurs")
     */
    private $utiMangas;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Illustration", mappedBy="utilisateurs")
     */
    private $utiIllustrations;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="utilisateur")
     */
    private $utiTickets;


    /**
     * @return ArrayCollection
     */
    public function getUtiTickets(): ArrayCollection
    {
        return $this->utiTickets;
    }


    public function __construct()
    {
        $this->lanId = 1;
        $this->utiInscription = $this->utiDerniereMAJ = new \DateTime();
        $this->utiRoles = new ArrayCollection();
        $this->utiActivites = new ArrayCollection();
        $this->utiNews = new ArrayCollection();
        $this->recrutements = new ArrayCollection();
        $this->candidatures = new ArrayCollection();
        $this->utiScenarios = new ArrayCollection();
        $this->utiMangas = new ArrayCollection();
        $this->utiIllustrations = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param Illustration|null $illustration
     * @return $this
     */
    public function addUtiIllustration(?Illustration $illustration): self
    {
        if(!$this->utiIllustrations->contains($illustration))
        {
            $this->utiIllustrations[] = $illustration;
        }
        return $this;
    }

    /**
     * @return ArrayCollection|null
     */
    public function getUtiIllustration()
    {
        return $this->utiIllustrations;
    }

    public function getUtiManga()
    {
        return $this->utiMangas;
    }

    /**
     * @param Manga|null $manga
     * @return $this
     */
    public function addUtiManga(?Manga $manga): self
    {
        if(!$this->utiMangas->contains($manga))
        {
            $this->utiMangas[] = $manga;
        }
        return $this;
    }

    /**
     * @return ArrayCollection|null
     */
    public function getUtiScenario()
    {
        return $this->utiScenarios;
    }

    /**
     * @param Scenario $scenario
     * @return $this
     */
    public function addUtiScenario(Scenario $scenario): self
    {
        if(!$this->utiScenarios->contains($scenario))
        {
            $this->utiScenarios[] = $scenario;
        }
        return $this;
    }

    public function getUtiIdParrainer(): ?int
    {
        return $this->utiIdParrainer;
    }

    public function setUtiIdParrainer(?int $utiIdParrainer): self
    {
        $this->utiIdParrainer = $utiIdParrainer;

        return $this;
    }

    public function getLanId(): ?int
    {
        return $this->lanId;
    }

    public function setLanId(int $lanId): self
    {
        $this->lanId = $lanId;

        return $this;
    }

    public function getUtiMail(): ?string
    {
        return $this->utiMail;
    }

    public function setUtiMail(?string $utiMail): self
    {
        $this->utiMail = $utiMail;

        return $this;
    }

    public function getUtiTelephone(): ?string
    {
        return $this->utiTelephone;
    }

    public function setUtiTelephone(?string $utiTelephone): self
    {
        $this->utiTelephone = $utiTelephone;

        return $this;
    }

    public function getUtiNaissance(): ?\DateTimeInterface
    {
        return $this->utiNaissance;
    }

    public function getUtiNaissanceString(): string
    {
        $resultat = 'Aucun';

        if ($this->utiNaissance !== null)
            $resultat = $this->utiNaissance->format('d-m-Y H:i:s');

        return $resultat;
    }

    public function setUtiNaissance(?\DateTimeInterface $utiNaissance): self
    {
        $this->utiNaissance = $utiNaissance;

        return $this;
    }

    public function getUtiInscription(): ?\DateTimeInterface
    {
        return $this->utiInscription;
    }

    public function getUtiInscriptionString(): string
    {
        return $this->utiInscription->format('d-m-Y');
    }

    public function setUtiInscription(?\DateTimeInterface $utiInscription): self
    {
        $this->utiInscription = $utiInscription;

        return $this;
    }

    public function getUtiDerniereSession(): ?\DateTimeInterface
    {
        return $this->utiDerniereSession;
    }

    public function getUtiDerniereSessionString(): string
    {
        $resultat = 'Aucun';

        if ($this->utiDerniereSession !== null)
            $resultat = $this->utiDerniereSession->format('d-m-Y H:i:s');

        return $resultat;
    }

    public function setUtiDerniereSession(?\DateTimeInterface $utiDerniereSession): self
    {
        $this->utiDerniereSession = $utiDerniereSession;

        return $this;
    }

    public function getUtiConnecte(): ?bool
    {
        return $this->utiConnecte;
    }

    public function setUtiConnecte(?bool $utiConnecte): self
    {
        $this->utiConnecte = $utiConnecte;

        return $this;
    }

    public function getUtiTokens(): ?int
    {
        return $this->utiTokens;
    }

    public function setUtiTokens(?int $utiTokens): self
    {
        $this->utiTokens = $utiTokens;

        return $this;
    }

    public function getUtiBiographie(): ?string
    {
        return $this->utiBiographie;
    }

    public function setUtiBiographie(?string $utiBiographie): self
    {
        $this->utiBiographie = $utiBiographie;

        return $this;
    }

    public function getUtiMdp(): ?string
    {
        return $this->utiMdp;
    }

    public function setUtiMdp(?string $utiMdp): self
    {
        $this->utiMdp = $utiMdp;

        return $this;
    }

    public function getUtiIp(): ?string
    {
        return $this->utiIp;
    }

    public function setUtiIp(?string $utiIp): self
    {
        $this->utiIp = $utiIp;

        return $this;
    }

    public function getUtiNotif(): ?int
    {
        return $this->utiNotif;
    }

    public function setUtiNotif(?int $utiNotif): self
    {
        $this->utiNotif = $utiNotif;

        return $this;
    }


    /**
     * Véritable getter de utiRoles du plus important au moins important.
     */
    public function getUtiRoles() {
        $orderedCollection = new ArrayCollection();

        for ($i = $this->utiRoles->count(); $i > 0; $i--)
            $orderedCollection->add($this->utiRoles->get($i-1));

        return $orderedCollection;
    }

    /**
     * Cette fonction, retourne désormais toutes les permissions d'un
     * utilisateur en fonction de ses rôles. Ainsi, nous pouvons gérer
     * les accès aux controllers grâce à des permissions.
     *
     * @return array
     */
    public function getRoles()
    {
        $resultat[] = '';

        foreach ($this->utiRoles as $role)
            foreach ($role->getPermissions() as $permission)
                $resultat[] = 'ROLE_'.$permission->getId();

        return array_unique($resultat);
    }

    public function addUtiRole(Role $role): self
    {
        if (!$this->utiRoles->contains($role)) {
            $this->utiRoles->add($role);
            $role->addUtilisateur($this);
        }

        return $this;
    }

    public function removeUtiRole(Role $role): self
    {
        if ($this->utiRoles->contains($role)) {
            $this->utiRoles->removeElement($role);
            $role->removeUtilisateur($this);
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getUtiAvatarFichier(): ?File
    {
        return $this->utiAvatarFichier;
    }

    /**
     * @param File|null $utiAvatarFichier
     * @return Utilisateur
     * @throws Exception
     */
    public function setUtiAvatarFichier(File $utiAvatarFichier = null): Utilisateur
    {
        $this->utiAvatarFichier = $utiAvatarFichier;

        if (null !== $utiAvatarFichier) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->utiDerniereMAJ = new \DateTime();
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUtiAvatarNomFichier(): ?string
    {
        return $this->utiAvatarNomFichier;
    }

    /**
     * @param string|null $utiAvatarNomFichier
     * @return Utilisateur
     */
    public function setUtiAvatarNomFichier(?string $utiAvatarNomFichier): Utilisateur
    {
        $this->utiAvatarNomFichier = $utiAvatarNomFichier;
        return $this;
    }

    public function getUtiDerniereMAJ(): ?\DateTimeInterface
    {
        return $this->utiDerniereMAJ;
    }

    public function setUtiDerniereMAJ(\DateTimeInterface $utiDerniereMAJ): self
    {
        $this->utiDerniereMAJ = $utiDerniereMAJ;

        return $this;
    }

    /**
     * @return Collection|Activites[]
     */
    public function getUtiActivites(): Collection
    {
        return $this->utiActivites;
    }

    public function addUtiActivite(Activites $utiActivite): self
    {
        if (!$this->utiActivites->contains($utiActivite)) {
            $this->utiActivites[] = $utiActivite;
            $utiActivite->setActUtilisateur($this);
        }

        return $this;
    }

    public function removeUtiActivite(Activites $utiActivite): self
    {
        if ($this->utiActivites->contains($utiActivite)) {
            $this->utiActivites->removeElement($utiActivite);
            // set the owning side to null (unless already changed)
            if ($utiActivite->getActUtilisateur() === $this) {
                $utiActivite->setActUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getUtiNews(): Collection
    {
        return $this->utiNews;
    }



    public function addArticles(News $arti): self
    {
        if (!$this->utiNews->contains($arti))
            $this->utiNews->add($arti);
        return $this;
    }

    public function removeArticles(News $articles): self
    {
        if ($this->utiNews->contains($articles))
            $this->utiNews->removeElement($articles);
        return $this;
    }




    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->utiMdp;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->id;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {

    }

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->utiMdp
        ]);
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->utiMdp
            ) = unserialize($serialized);
    }

    /**
     * @return Collection|Recrutement[]
     */
    public function getRecrutements(): Collection
    {
        return $this->recrutements;
    }

    public function addRecrutement(Recrutement $recrutement): self
    {
        if (!$this->recrutements->contains($recrutement)) {
            $this->recrutements[] = $recrutement;
            $recrutement->setUtilisateur($this);
        }

        return $this;
    }

    public function removeRecrutement(Recrutement $recrutement): self
    {
        if ($this->recrutements->contains($recrutement)) {
            $this->recrutements->removeElement($recrutement);
            // set the owning side to null (unless already changed)
            if ($recrutement->getUtilisateur() === $this) {
                $recrutement->setUtilisateur(null);
            }
        }

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
            $candidature->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): self
    {
        if ($this->candidatures->contains($candidature)) {
            $this->candidatures->removeElement($candidature);
            // set the owning side to null (unless already changed)
            if ($candidature->getUtilisateur() === $this) {
                $candidature->setUtilisateur(null);
            }
        }

        return $this;
    }
}
