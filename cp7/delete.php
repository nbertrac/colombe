<?php
include_once('test_session.php');
if (!isset($_GET['t']) || empty($_GET['t']) || !isset($_GET['k']) || empty($_GET['k']) || !isset($_GET['v']) || empty($_GET['v'])){
    echo '<p><strong>Attention ! </strong> Aucune donnée à afficher : <a href="bo.php">retour au back-office</a></p>';
    exit();
}
include_once('pdo_connect.php');
$t=htmlspecialchars($_GET['t']);
$k=htmlspecialchars($_GET['k']);
$v=htmlspecialchars($_GET['v']);
try {
    $sql='DELETE from '.$t.' WHERE '.$k.' = '.$v;
    $qry= $cnn->prepare($sql);
    $qry->execute();
}catch (PDOException $err){
    echo '<p class="alert alert-danger">'.$err->getMessage().'</p>';
}
header('location:list.php?t='.$t.'&k='.$k);