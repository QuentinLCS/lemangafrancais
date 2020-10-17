<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Permission
 *
 * @ORM\Entity(repositoryClass="App\Repository\PermissionRepository")
 */
class Permission
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     * @ORM\Id()
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $perDescription;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Role", mappedBy="permissions")
     */
    private $roles;


    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return strtoupper($this->id);
    }

    public function getPerDescription(): ?string
    {
        return $this->perDescription;
    }

    public function setPerDesc(?string $perDesc): self
    {
        $this->perDescription = $perDesc;

        return $this;
    }

    public function getRoles(): ArrayCollection
    {
        return $this->roles;
    }

    public function addRole(Role $role): self
    {
        if (!$this->roles->contains($role))
            $this->roles->add($role);

        return $this;
    }

    public function removeRole(Role $role): self
    {
        if ($this->roles->contains($role))
            $this->roles->removeElement($role);

        return $this;
    }


}
