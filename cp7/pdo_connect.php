<?php
include_once("constants.php");
try{
    $cnn=new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS);
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $err){
    echo $err->getMessage();
}