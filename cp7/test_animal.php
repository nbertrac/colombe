<?php
include_once('animal.class.php');
echo '<h2>Test 1 : Instancaition</h2>';
$obj1 = new Animal();
$obj1 -> name='Milou'; // Valorisation attribut
//$obj1->color='Blanc';
echo '<p>' . $obj1->move(); //Appel méthode
var_dump($obj1);

echo '<h2>Test 2 : Utilisation des accesseurs</h2>';
$obj2 = new Animal('joke', Animal::TYPE_WIND, 'blue', 100);
$obj2->name='Soonpy';
$obj2->setType('lpol');
echo '<p>' . $obj2->getType();
var_dump($obj2);

echo '<h2>Test 3 : Test constante</h2>';
echo '<p>' . Animal::TYPE_GROUND;

echo '<h2>Test 4 : Test poid, color, move</h2>';
$obj4 = new Animal('Charizard',Animal::TYPE_WATER ,'red', 700);
echo '<p>' . $obj4->getWeight(). '    '. $obj4->getColor().'      '. $obj4->move();
var_dump($obj4);

echo '<h2>Test 4 : Test eat</h2>';
$obj2->eat($obj4);
echo '<p>'. $obj2->getWeight().' and   '. $obj4->getWeight();