<?php
include_once('constants.php');
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
    <script src="cal/main.min.js"></script>
    <script src="calendar.js"></script>
    <link rel="stylesheet" href="cal/main.min.css">
</head>
<body class="container">
    <h1>Calendrier des commandes</h1>
    <div class="btn-group" role="group" aria-label="Basic example">
            <a href="statistiques.php" class="btn btn-secondary">Statistiques des ventes<a>
            <a href="calendar.php" class="btn btn-secondary">Calendrier des commandes</a>
        </div>
    <div id="calendar"></div>
</body>
</html>