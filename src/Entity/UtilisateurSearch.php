<?php


namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class UtilisateurSearch
{

    /**
     * @var string|null
     */
    private $pseudonyme;

    /**
     * @var ArrayCollection
     */
    private $roles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    /**
     * @return string|null
     */
    public function getPseudonyme(): ?string
    {
        return $this->pseudonyme;
    }

    /**
     * @param string|null $pseudonyme
     * @return UtilisateurSearch
     */
    public function setPseudonyme(?string $pseudonyme): UtilisateurSearch
    {
        $this->pseudonyme = $pseudonyme;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getRoles(): ArrayCollection
    {
        return $this->roles;
    }

    /**
     * @param ArrayCollection $roles
     * @return void
     */
    public function setRoles(ArrayCollection $roles): void
    {
        $this->roles = $roles;
    }



}