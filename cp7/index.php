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
    <div class="jumbotron">
        <h1 class="display-4">Northwind Traders</h1>
        <p class="lead">Projet fil rouge en HTML, CSS, JS, PHP et MySQL basé sur le jeu de données Northwind.
        <?php
            include_once('team.php');
            $d = (strtotime(date("Y-m-d"))- strtotime('2020-11-02'))/60/60/24;
            echo "Réalisé par ".PRENOM.", Darons Coder depuis $d jours.";
        ?>
        </p>
        <hr class="my-4">
        <p>Cliquer sur le bouton ci-dessous pour accéder au back-office (user et mot de passe requis) :</p>
        <a class="btn btn-success btn-lg" href="#" role="button">Connexion</a>
    </div>
    <?php
    include_once('projects.php');
    ?>
    <section id="team" class="d-flex justify-content-around flex-wrap">
        <?php
            $html='';
            for($i=0;$i<count($members);$i++){
                if($members[$i][2] == "M")$html .='<div class="card text-white bg-primary mb-3" style="width: 18rem;">';
                else $html .='<div class="card text-white G mb-3" style="width: 18rem;">';
                $html .='<div class="card-body">';
                $html .='<h5 class="card-title">'.$members[$i][0].'</h5>';
                $html .='<p class="card-text">'.$members[$i][1].'ans</p>';
                $html .= "<p class='card-text'>". ($members[$i][3] ? ($members[$i][2] ==='F' ? 'Mariée' : 'Marié') : 'Célibataire') . '<p>';
                /*if($members[$i][3] && $members[$i][2] === "F") $html .='<p class="card-text">Mariée </p>';
                else if($members[$i][3] && $members[$i][2] === "M") $html .='<p class="card-text">Marié </p>';
                else $html .='<p class="card-text">Célibataire </p>';*/
                $html .='</div></div>';
            };
            echo $html;
        ?>
</body>
</html>