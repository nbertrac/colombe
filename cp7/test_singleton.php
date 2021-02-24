<?php
// Imports
include_once('constants.php');
include_once('singleton.class.php');
include_once('model.php');

//test 1 : Connexion et Composant select
Singleton::setConfiguration(HOST,3306,DB,USER,PASS);
echo Singleton::getHtmlSelect('prod','SELECT * FROM produits');
//echo Singleton::getHtmlTable('SELECT * FROM commandes WHERE DATE_COMMANDE < ?', array('2018-05-01'));

/**
 * Model
 */

 // Test 4 : Instanciation
$produits=new Model(HOST,3306,DB,USER,PASS, 'produits');

// Test 5 : getRows
//var_dump($produits->getRows());

// Test 6 : getRow
var_dump($produits->getRow('REF_PRODUIT', 11));

// Test 7 : insert
$cat=new Model(HOST,3306,DB,USER,PASS, 'categories');
$cat->insert(array(
    'CODE_CATEGORIE'=>666,
    'NOM_CATEGORIE'=>'Devil Cream',
    'DESCRIPTION'=>'Diaboliquement bon'
));
var_dump($cat->getRows());