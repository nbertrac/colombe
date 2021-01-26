<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northwind Traders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body class="container">
    <div class="jumbotron">
        <h1 class="display-4">Northwind Traders</h1>
        <p class="lead">Projet fil rouge en HTML, CSS, JS, PHP et MySQL basé sur le jeu de données Northwind.</p>
        <hr class="my-4">
        <p>Cliquer sur le bouton ci-dessous pour accéder au back-office (user et mot de passe requis) :</p>
        <a class="btn btn-success btn-lg" href="#" role="button">Connexion</a>
    </div>
    <section id="team" class="d-flex flex-wrap">
        <?php
            include_once('team.php');
            $html='';
            for($i=0;$i<count($members);$i++){
                $html .='<div class="card" style="width: 18rem;">'.
                '<div class="card-body">'.
                '<h5 class="card-title">'.$members[$i][0].'</h5>'.
                '<p class="card-text">'.$members[$i][1].'ans</p>'.
                '<p class="card-text">Marié(e) '.$members[$i][3].'</p>'.
                '</div></div>';
            };
            echo $html;
        ?>
</body>
</html>