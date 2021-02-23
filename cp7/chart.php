<?php
include_once('test_session.php');
include_once('pdo_connect.php');

// Récupère les paramètres de l'URL
if (!isset($_GET['e']) || empty($_GET['e'])) $e=5;
else $e=$_GET['e'];

if (!isset($_GET['a']) || empty($_GET['a'])) $a=2019;
else $a=$_GET['a'];

// Prépare et exécute la requête
$sql="SELECT e.no_employe, e.nom, YEAR(c.date_commande) as annee, MONTH(c.date_commande) as mois, SUM((d.PRIX_UNITAIRE*d.QUANTITE)*(1-d.remise)) as ca
FROM employes e
JOIN commandes c
ON e.no_employe=c.no_employe
JOIN details_commandes d
ON c.no_commande = d.no_commande
WHERE e.NO_EMPLOYE = ?
AND YEAR(c.date_commande) = ?
GROUP BY e.NO_EMPLOYE, e.nom, YEAR(c.date_commande), MONTH(c.date_commande)";
$qry=$cnn->prepare($sql);
$qry->execute(array($e,$a));
$data=$qry->fetchAll(PDO::FETCH_ASSOC);

// Génère la zone de dessin
$w=800;
$h=600;
$img= imagecreatefromjpeg('Veil_Nebula_800x600.jpg');

// Crayons de couleur
$black=imagecolorallocate($img,0,0,0);
$white=imagecolorallocate($img,255,255,255);
$trans=imagecolorallocatealpha($img,255,255,255,63);

// Fond transparent
imagefilledrectangle($img,0,0,$w,$h,$trans);

// Variable de calcul
$gap=20;
$wbar=($w-($gap*2))/count($data);
$hmax=$h-($gap*2);
$val_max=150000; //CA max

// Dessine l'histogramme via la requête
for($i=0;$i<count($data);$i++){
    // Barres
    $hbar=round(($data[$i]['ca']*($hmax-$gap))/$val_max);
    $alea=imagecolorallocatealpha($img,rand(0,255),rand(0,255),rand(0,255),31);
    imagefilledrectangle($img,$gap+($i*$wbar),$hmax-$hbar,$gap+($i*$wbar)+$wbar,$h-$gap,$alea);
    imagefilledrectangle($img,$gap+($i*$wbar),$hmax-$hbar,$gap+($i*$wbar)+$wbar,$h-$gap,$white);
    // Labels : CA en haut des barres
    imagestring($img,5,$gap+($i*$wbar),$h-$hbar-(3*-$gap),round($data[$i]['ca'])/1000, $white);
    // Graduation en bas des barres
    imagestring($img,5,$gap+($i*$wbar),$h-$gap,$data[$i]['mois'],$black);
}

// Affiche le resultat
header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);