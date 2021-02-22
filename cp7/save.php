<?php
include_once('test_session.php');
include_once('pdo_connect.php');
if (!isset($_GET['t']) || empty($_GET['t']) || !isset($_GET['k']) || empty($_GET['k']) || !isset($_GET['v'])){
    echo '<p><strong>Attention ! </strong> Aucune donnée à afficher : <a href="bo.php">retour au back-office</a></p>';
    exit();
}
$t=$_GET['t'];
$k=$_GET['k'];
$v=$_GET['v'];
//recup dans une variable tableau associatif la clé et la valeur de chaque colonne Exemple pour USERS : array('mail'=>'tot@titi.org',)
if(empty($_GET['v'])) {
    $cols=[];
    $vals=[];
    $sql = "INSERT INTO $t(%s) VALUES(%s)";
    foreach($_POST as $key => $value){
        $cols[]=$key;
        $vals[":$key"]= htmlspecialchars($value);
    }
    $sql=sprintf($sql,implode(',',$cols),implode(',',array_keys($vals)));
}else{
    $sql="UPDATE $t SET %s WHERE $k=:$k";
    foreach($_POST as $key => $value){
        $cols[]=$key.'=:'.$key;
        $vals[":$key"]= htmlspecialchars($value);
    }
    $sql=sprintf($sql,implode(',',$cols));
    echo $sql;
}
try{
    $qry=$cnn->prepare($sql);
    $qry->execute($vals);
    echo 'succes';
    header("location:list.php?t=$t&k=$k");
} catch (PDOException $err){
    echo $err->getMessage();
}