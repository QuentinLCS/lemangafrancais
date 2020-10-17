<?php


namespace App\Entity;


class LexiqueSearch
{
    /**
     * @var string
     */
    private $mot;

    /**
     * @return string
     */
    public function getMot(): ? string
    {
        return $this->mot;
    }
    public function setMot(?string $mot) : LexiqueSearch
    {
        $this->mot = $mot;
        return $this;
    }

}