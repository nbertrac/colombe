<?php
include_once('animal.class.php');

class Human extends Animal
{
    // Propriété privée
    private $fname = '';

    // Constructeur
    public function __construct(string $newFName, string $newDob)
    {
        // Valorise les attributs
        $this->setFName($newFName);
        $this->setDob($newDob);
        // Incrémente le nombre d'instances
        parent::$nb++;
    }

    // Accesseurs/Mutateurs

    // Surcharger le mutateur setWeight avec
    // poids : 1kg
    // poids : 300kg


    public function getFName(): string
    {
        return $this->fname;
    }

    public function setFName(string $newFName){
        $this->fname=$newFName;
    }
}
