<?php
include_once('constants.php');
include_once('test_session.php');
include_once('singleton.class.php');
include_once('model.php');
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
    <h1>Statistiques des ventes</h1>
    <div class="form-group">
        <label for="year">Année : </label>
            <?php
            Singleton::setConfiguration(HOST,3306,DB,USER,PASS);
            echo Singleton::getHtmlSelect('year','SELECT DISTINCT YEAR(DATE_COMMANDE) as annee FROM commandes');
            ?>
    </div>
    <div class="form-group">
        <label for="Vendeur">Vendeur.euse : </label>
            <?php
            echo Singleton::getHtmlSelect('emp','SELECT NO_EMPLOYE, CONCAT(PRENOM,\' \',NOM) as employe FROM employes');
            ?>
    </div>
    <div>
    <img id="chart" src="chart.php" alt="Stats des ventes">
    </div>
    <script src="stat.js"></script>
</body>
</html>