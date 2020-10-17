<?php


namespace App\Entity;


use DateTime;

class ScenarioSearch
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @return string
     */
    public function getTitre(): ? string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return ScenarioSearch
     */
    public function setTitre(?string $titre): ScenarioSearch
    {
        $this->titre = $titre;
        return $this;
    }

}
