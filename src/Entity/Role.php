<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Role
 *
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 */
class Role
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, unique=true)
     * @ORM\Id()
     * @Assert\Length(
     *      min = 1,
     *      max = 4
     *     )
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $rolNom;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $rolDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=6, nullable=true)
     */
    private $rolCouleur;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", mappedBy="utiRoles")
     */
    private $utilisateurs;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Permission", inversedBy="roles")
     * @ORM\JoinTable(name="posseder")
     */
    private $permissions;

    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recrutement", mappedBy="role", orphanRemoval=true)
     */
    private $recrutements;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->permissions = new ArrayCollection();
        $this->recrutements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = (int)$id;

        return $this;
    }

    public function getRolNom(): ?string
    {
        return $this->rolNom;
    }

    public function setRolNom(?string $rolNom): Role
    {
        $this->rolNom = $rolNom;
        return $this;
    }

    public function getRolDescription(): ?string
    {
        return $this->rolDescription;
    }

    public function setRolDescription(?string $rolDescription): self
    {
        $this->rolDescription = $rolDescription;

        return $this;
    }

    public function getRolCouleur(): ?string
    {
        return "#".$this->rolCouleur;
    }

    public function setRolCouleur(?string $rolCouleur): self
    {
        $this->rolCouleur = $rolCouleur;

        return $this;
    }

    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
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

    public function getPermissionsString()
    {
        $resultat[] = '';

        foreach ($this->permissions as $permission)
            $resultat[] = $permission->getId();

        return $resultat;
    }

    public function getPermissions(): Collection
    {
        return $this->permissions;
    }

    public function addPermission(Permission $permission): self
    {
        if (!$this->permissions->contains($permission)) {
            $this->permissions->add($permission);
            $permission->addRole($this);
        }

        return $this;
    }

    public function removePermission(Permission $permission): self
    {
        if ($this->permissions->contains($permission)) {
            $this->permissions->removeElement($permission);
            $permission->removeRole($this);
        }

        return $this;
    }

    public function getSlug() : string
    {
        return isset($this->slug) ? $this->slug : $this->slug = (new Slugify())->slugify($this->rolNom);
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
            $recrutement->setRole($this);
        }

        return $this;
    }

    public function removeRecrutement(Recrutement $recrutement): self
    {
        if ($this->recrutements->contains($recrutement)) {
            $this->recrutements->removeElement($recrutement);
            // set the owning side to null (unless already changed)
            if ($recrutement->getRole() === $this) {
                $recrutement->setRole(null);
            }
        }

        return $this;
    }

}
