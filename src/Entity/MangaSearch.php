<?php


namespace App\Entity;




use DateTime;

class MangaSearch
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
     * @return MangaSearch
     */
    public function setTitre(?string $titre): MangaSearch
    {
        $this->titre = $titre;
        return $this;
    }

}