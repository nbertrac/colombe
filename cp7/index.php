<?php
$cnn=mysqli_connect('localhost', 'root', 'greta', 'information_schema');
$res=mysqli_query($cnn, 'SELECT table_name, table_rows FROM tables where table_schema = "northwind"');
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
    <div class="jumbotron">
        <h1 class="display-4">Northwind Traders</h1>
        <?php
            if(isset($_GET['t']) && $_GET['t']==='1'){
                echo    ('<div class="alert alert-light alert-dismissible fade show" role="alert">
                            Utilisateur créé avec succès!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>');
            }
            if(isset($_GET['tried']) && !empty($_GET['tried'])) echo '<div class="alert alert-light alert-dismissible fade show" role="alert">
            Un des champs est faux
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>';
        ?>
        <p class="lead">Projet fil rouge en HTML, CSS, JS, PHP et MySQL basé sur le jeu de données Northwind.
        <?php
            include_once('team.php');
            $d = (strtotime(date("Y-m-d"))- strtotime('2020-11-02'))/60/60/24;
            echo "Réalisé par ".PRENOM.", Darons Coder depuis $d jours.";
        ?>
        </p>
        <hr class="my-4">
        <p>Cliquer sur le bouton ci-dessous pour accéder au back-office (user et mot de passe requis) :</p>
        <a class="btn btn-success btn-lg" href="login.php" role="button" data-toggle="modal" data-target="#login">Connexion</a>
        <a class="btn btn-warning btn-lg" href="#" role="button" data-toggle="modal" data-target="#register">Inscription</a>
    </div>
    <h2>Membres de l'équipe</h2>
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
    </section>

    <h2>Nos références</h2>
    <section id='projects'>
    <?php
    include_once('projects.php');
    ?>
    </section>

    <div id="bo">
            <h2>Back-office</h2>
            <section id="tables">
                <?php
                    $html='';
                    while($row=mysqli_fetch_assoc($res)){
                        $html .='<a class="btn btn-primary" href="categories.php"'.$row["TABLE_NAME"].'">'.$row["TABLE_NAME"].' <span class="badge badge-light">'.$row["TABLE_ROWS"].'</span></a>';
                    }
                    echo $html;
                    mysqli_close($cnn);
                ?>
            </section>
    </div>
<!-- Modal -->
<div class="modal fade" id="login" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="login.php" method="post" id="cform">
      <div class="modal-body">
            <div class="form-group">
                <label for="mail">Mail : </label>
                <input type="email" name="mail" id="mail" required class="form-control">
            </div>
            <div class="form-group">
                <label for="pass">Password : </label>
                <input type="password" name="pass" id="cpass" pattern="[A-za-z0-9@$*!? ]{8,}" required class="form-control">
            </div>
                </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Send" class="btn btn-primary" id="send">
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Inscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="register.php" method="post" id='form'>
      <div class="modal-body">
            <div class="form-group">
                <label for="pseudo">Pseudo : </label>
                <input type="text" name="fname" id="fname" pattern="[A-Za-z\u00c0-\u00FF 0-9'\-]{1,25}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="mail">Mail : </label>
                <input type="email" name="mail" id="mail" required class="form-control">
            </div>
            <div class="form-group">
                <label for="pass">Password : </label>
                <input type="password" name="pass" id="pass" pattern="[A-za-z0-9@$*!? ]{8,}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="check">Check password : </label>
                <input type="password" id="check" pattern="[A-za-z0-9@$*!? ]{8,}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="land">Pays : </label>
                <select name="land" id="land" class="form-control">
                    <?php
                        $json=file_get_contents('https://restcountries.eu/rest/v2/lang/fr?fields=translations;alpha2Code');
                        $obj=json_decode($json);
                        $html='';
                        foreach($obj as $val){
                            $html.='<option value="'.$val->alpha2Code.'">'.$val->translations->fr.'</option>';
                        }
                        echo $html;
                    ?>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Send" class="btn btn-primary" id="send">
      </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="sub.js"></script>
</body>
</html>