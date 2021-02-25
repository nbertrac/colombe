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
    <h1>Prise de commande</h1>
    <div class="btn-group" role="group" aria-label="Basic example">
            <a href="statistiques.php" class="btn btn-secondary">Statistiques des ventes<a>
            <a href="calendar.php" class="btn btn-secondary">Calendrier des commandes</a>
        </div>
    <form action="new_order_save.php" method="post">
        <div class="form-group">
            <label for="NO_COMMANDE">N° Commande</label>
            <input type="number" name="NO_COMMANDE" id="NO_COMMANDE" class="form-control" value="12000">
        </div>
        <div class="form-group">
            <label for="CODE_CLIENT">Client</label>
            <div>
            <?php
                Singleton::setConfiguration(HOST,3306,DB,USER,PASS);
                echo Singleton::getHtmlSelect('CODE_CLIENT','SELECT CODE_CLIENT, SOCIETE FROM clients')
            ?>
            </div>
        </div>
        <div class="form-group">
            <label for="NO_EMPLOYE">Vendeur</label>
            <div>
            <?php
                echo Singleton::getHtmlSelect('NO_EMPLOYE','SELECT NO_EMPLOYE, CONCAT(PRENOM,\' \',NOM) as employe FROM employes')
            ?>
            </div>
        </div>
        <div class="form-group">
            <label for="DATE_COMMANDE">Date de commande</label>
            <input type="date" name="DATE_COMMANDE" id="DATE_COMMANDE" class="form-control">
        </div>
        <div class="form-group">
            <label for="DATE_ENVOI">Date d'envoi</label>
            <input type="date" name="DATE_ENVOI" id="DATE_ENVOI" class="form-control">
        </div>
        <div class="form-group">
            <label for="PORT">Frais de port</label>
            <input type="text" name="PORT" id="PORT" class="form-control">
        </div>
        <input type="submit" value="Valider la commande" class="btn btn-primary">
    </form>
</body>
</html>