<?php
// Démarre ou restaure une session
session_start();
// Teste si une connexion est active
if (!isset($_SESSION['connected']) || !$_SESSION['connected']){
    header('location:index.php?c=2');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northwind Traders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecp7.css">

</head>
<body class="container">
    <h1>Back-office</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Back-office</li>
        </ol>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="statistiques.php" class="btn btn-secondary">Statistiques des ventes<a>
            <a href="calendar.php" class="btn btn-secondary">Calendrier des commandes</a>
        </div>
    </nav>
    <section class="row d-flex justify-content-between">
        <?php
            include_once('constants.php');
            try{
            //$pod=new PDO('mysql:host=localhost', 'root', 'greta');
            $cnn=new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS);
            $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $req='SELECT t.TABLE_NAME, t.TABLE_ROWS, c.COLUMN_NAME
            FROM information_schema.tables t
            JOIN information_schema.columns c
            ON t.TABLE_SCHEMA = c.TABLE_SCHEMA
            AND t.TABLE_NAME= c.TABLE_NAME
            WHERE t.TABLE_SCHEMA= ?
            AND c.COLUMN_KEY = ?
            AND t.TABLE_ROWS < ?';
            $qry=$cnn->prepare($req);
            $vals=array(DB, 'PRI', 1000);
            $qry->execute($vals);
            $html='';
            while($row=$qry->fetch(PDO::FETCH_ASSOC)){
                $html .='<div class="card text-white G mb-3" style="width: 18rem;">';
                $html .='<img src="info.jpg" class"card-img-top H">';
                $html .='<div class="card-body">';
                $html .='<h5 class="card-title">'.$row["TABLE_NAME"].'</h5>';
                $html .='<p class="card-text">Clé primaire : '.$row["COLUMN_NAME"].'</p>';
                $html .='<p class="card-text">Nombre de lignes : '.$row["TABLE_ROWS"].'</p>';
                $html .='<a href="list.php?t='.$row['TABLE_NAME'].'&k='.$row["COLUMN_NAME"].'" class="btn btn-primary">Détails</a>';
                $html .='</div></div>';
            }
            echo $html;
            unset($cnn);
            }catch (PDOException $err) {
                echo '<p class="alert alert-danger">'.$err->getMessage().'</p>';
            }
        ?>
</section>
</body>
</html>