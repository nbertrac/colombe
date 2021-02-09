<?php
class Animal{
    
    //Propriété publiques
    public $name='';

    //Propriété privées
    private $type='';
    private $color='';
    private $weight=0.0;

    //Constantes de class
    const TYPE_WIND = 'aérien';
    const TYPE_WATER = 'marin';
    const TYPE_GROUND = 'terrestre';
    const TYPE_ELSE = 'autre';

    //Constructeur de la classe
    public function __construct(string $newName="", string $newType=self::TYPE_ELSE, string $newColor='blanc', float $newWeight=0.02)
    {
        //Assigne les valeurs des arguments aux attributs
        $this->name=$newName;
        $this->type=$newType;
        $this->color=$newColor;
        $this->weight=$newWeight;
    }

    //Accesseurs/Mutateurs (Getters/Setters)
    public function getType() : string{
        return $this->type;
    }

    public function setType(string $newType){
        // LE type ne peut être que : terrestre, marin ou aérien
        $newType=strtolower($newType);
        if($newType===self::TYPE_GROUND || $newType===self::TYPE_WATER || $newType===self::TYPE_WIND || $newType===self::TYPE_ELSE) $this->type = $newType;
        else $this->type = self::TYPE_ELSE;
    }

    public function getColor() : string{
        return $this->color;
    }

    public function setColor(string $newColor){
        $this->color = $newColor;
    }

    public function getWeight() : float{
        return $this->weight;
    }

    public function setWeight(float $newWeight){
        // Le poid doit être compris entre 20g(souris) et 1100kg(cheval)
        if($newWeight>= 0.02 && $newWeight<= 1100) $this->weight = $newWeight;
        else throw new Exception('Le poid doit être compris entre 20g(souris) et 1100kg(cheval).');
    }

    //Méthode publique pour se déplacer
    public function move() : string{
        //Selon l'environnement de l'animal afficher le mode de déplacement
        switch ($this->type) {
            case self::TYPE_GROUND:
                return "Je creuse";
                //break;
            case self::TYPE_WATER:
                return "Je nage";
                //break;
            case self::TYPE_WIND:
                return 'Je vole';
                //break;
            default:
               return "Je me teleport";
        }
    }

    public function eat(Animal $proie){
        //Un animal mange un autre animal : la proie perd son poids le prédateur gagne le pois de la proie
        $this->weight=$this->weight + $proie->getWeight();
        $proie->weight=0;
    }

}