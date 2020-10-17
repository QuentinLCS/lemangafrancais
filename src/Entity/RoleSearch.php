<?php


namespace App\Entity;


class RoleSearch
{

    /**
     * @var string|null
     */
    private $nom;

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     * @return RoleSearch
     */
    public function setNom(?string $nom): RoleSearch
    {
        $this->nom = $nom;

        return $this;
    }

}