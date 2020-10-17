<?php


namespace App\Entity;


use DateTime;

class IllustrationSearch
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @return string
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return IllustrationSearch
     */
    public function setTitre(?string $titre): IllustrationSearch
    {
        $this->titre = $titre;
        return $this;
    }

}
