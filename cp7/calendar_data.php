<?php
include_once('constants.php');
include_once('singleton.class.php');
include_once('model.php');
// Renvoie les commandes passées sous la form JSON
Singleton::setConfiguration(HOST,3306,DB,USER,PASS);
$sql="SELECT CONCAT(co.NO_COMMANDE,' - ',cl.SOCIETE) AS title,
co.DATE_COMMANDE as start,
IFNULL(co.DATE_ENVOI, co.DATE_COMMANDE) as end
FROM commandes co
JOIN clients cl
ON co.CODE_CLIENT = cl.CODE_CLIENT";
echo Singleton::getAllData($sql);