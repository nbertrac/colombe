<?php
include_once('test_session.php');
include_once('pdo_connect.php');
if(!isset($_GET['t']) || empty($_GET['t'])) echo 'Aucune table trouvée !';
try {
    $t=$_GET['t'];
    $sql="SELECT * FROM $t";
    $qry=$cnn->query($sql);
    $obj=$qry->fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($obj, JSON_NUMERIC_CHECK);
    unset($cnn);
} catch(PDOException $err){
    echo $err->getMessage();
}