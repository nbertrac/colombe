<?php
// Ouvre la BDD en MYSQLI
$cnn=mysqli_connect('localhost', 'root', 'greta', 'northwind');
$res=mysqli_query($cnn, 'SELECT * FROM categories');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northwind Traders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body class="container">
    <h1>Liste des catégories</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
            <li class="breadcrumb-item"><a href="index.php"></a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des catégories</li>
        </ol>
    </nav>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <?php
                    //Liste des colonnes
                    $html='';
                    while($col=mysqli_fetch_field($res)){
                        $html .="<th>{$col->name}</th>";
                    }
                    echo $html;
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                //Liste les data
                $html='';
                while($row=mysqli_fetch_assoc($res)){
                    $html .= "<tr>";
                    foreach($row as $key => $val){
                        if(strpos($val, ';base64,')) $html.='<td><img src='.$val.' width="30rem"></td>';
                        else {
                            if(is_numeric($val)) $html.="<td><a href='edit_cat_form.php'>{$val}</a></td>";
                            else $html .="<td>{$val}</td>";
                        }
                    $html .= "</tr>";
                }
                echo $html;
            ?>
        </tbody>
    </table>
</body>
</html>