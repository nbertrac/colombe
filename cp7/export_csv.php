<?php
include_once('test_session.php');
include_once('pdo_connect.php');
if(!isset($_GET['t']) || empty($_GET['t'])) echo 'Aucune table trouvée !';
try {
    // Ouvre un flux
    $t=$_GET['t'];
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="'.$t.'.cvs"');
    $stream=fopen('php://output', 'w');
    $sql="SELECT * FROM $t";
    $qry=$cnn->query($sql);
    // Lit et écrit les nom de colonne
    $nb=$qry->columnCount();
    $row=[];
    for($i=0;$i<$nb;$i++){
        $meta=$qry->getColumnMeta($i);
        $row[]=$meta['name'];
    }
    fputcsv($stream,$row,';');
    while($row=$qry->fetch(PDO::FETCH_ASSOC)){
        fputcsv($stream,$row,';');
    }
    fclose($stream);
    unset($cnn);
} catch(PDOException $err){
    echo $err->getMessage();
}