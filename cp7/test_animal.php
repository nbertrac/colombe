<?php
include_once('animal.class.php');
echo '<h2>Test 1 : Instancaition</h2>';
$obj1 = new Animal();
$obj1 -> name='Milou'; // Valorisation attribut
//$obj1->color='Blanc';
echo '<p>' . $obj1->move(); //Appel méthode
var_dump($obj1);