<?php
var_dump($_POST);

// Connexion à la BDD via MYSQLI
$cnn = mysqli_connect('localhost', 'root', 'root', 'northwind');
$sql = "INSERT INTO categories(CODE_CATEGORIE, NOM_CATEGORIE, DESCRIPTION) VALUES({$_POST['CODE_CATEGORIE']}, {$POST['NOM_CATEGORIE']}, {$_POST['DESCRIPTION']})";
$res = mysqli_query($cnn, $sql);
echo $res;