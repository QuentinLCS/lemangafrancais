<?php


namespace App\Entity;




use DateTime;

class NewsSearch
{
    /**
     * @var string|null
     */
    private $titre;

    /**
     * @return string|null
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * @param string|null $titre
     * @return NewsSearch
     */
    public function setTitre(?string $titre): NewsSearch
    {
        $this->titre = $titre;
        return $this;
    }

}