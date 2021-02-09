<?php
class Animal{
    
    //Propriété publiques
    public $name='';

    //Propriété privées
    private $type='';
    private $color='';
    private $weight=0.0;

    //Accesseurs/Mutateurs (Getters/Setters)
    public function getType(){
        return $this->type;
    }

    //Méthode publique pour se déplacer
    public function move() : string{
        return 'Je me déplace';
    }

}