<?php
include_once('test_session.php');
include_once('pdo_connect.php');
if (isset($_GET['pg']) && !empty($_GET['pg'])) $pg= (int) $_GET['pg'];
else $pg=1;
//Récupère le nombre de lignes actifs si existe
if (isset($_GET['nb']) && !empty($_GET['nb'])) $nb= (int) $_GET['nb'];
else $nb=5;
$start= ($pg-1)*$nb;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northwind Traders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecp7.css">
    <script src="list.js"></script>
</head>
<body class="container">
    <?php
    $t=$_GET['t'];
    $k=$_GET['k'];
    //Message si pas d'info dans l'url
        if (!isset($_GET['t']) || empty($_GET['t']) || !isset($_GET['k']) || empty($_GET['k'])){
        echo '<p><strong>Attention ! </strong> Aucune donnée à afficher : <a href="bo.php">retour au back-office</a></p>';
        exit();
        }

        // Teste si table et colonne existent via information_schema
        // A faire plus tard

        //Affiche les titre
        $t=$_GET['t'];
        echo '<h1>Base de données : ' . DB . '</h1>';
        echo '<h2>Table : ' .$t. '</h2>';
        echo '<a class="btn btn-success m-1" href="edit.php?t='.$t.'&k='.$k.'&v=">Ajouter</a>';
        echo '<a class="btn btn-danger m-1" href="export_pdf.php?t='.$t.'">Export PDF</a>';
        echo '<a class="btn btn-secondary m-1" href="export_csv.php?t='.$t.'">Export CSV</a>';
        echo '<a class="btn btn-info m-1" href="export_xml.php?t='.$t.'">Export XML</a>';
        echo '<a class="btn btn-dark m-1" href="export_json.php?t='.$t.'">Export JSON</a>';
        // Exécute et lit la requête
        try {
            $sql="SELECT * FROM ".$t." LIMIT {$start}, {$nb}";
            $qry= $cnn->prepare($sql);
            $qry->execute();
        }catch (PDOException $err){
            echo '<p class="alert alert-danger">'.$err->getMessage().'</p>';
        }
    ?>
    <!-- breadcrumb -->
    <table class="table table-striped">
        <thead>
            <tr>
                <?php
                    // Affiche le nom des colonnes
                    $html ='';
                    $types=[];
                    for($i=0;$i<$qry->columnCount();$i++){
                        $meta=$qry->getColumnMeta($i);
                        $html.='<th>'.$meta['name'].'</th>';
                        //Stocke me type de la colonne
                        $types[$meta['name']] = $meta['native_type'];
                    }
                    $html.='<th>Maj</th>';
                    $html.='<th>Supprimer</th>';
                    echo $html;
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $html='';
                while ($row=$qry->fetch(PDO::FETCH_ASSOC)){
                    $html.='<tr>';
                    foreach($row as $key => $val){
                        //Alignement selon le type de la colonne
                        switch($types[$key]){
                            case 'LONG':
                            case 'NEWDECIMAL':
                                $align='right';
                                break;
                            case 'DATE':
                                break;
                            default:
                                $align='left';
                        }
                        // Selon BLOB ou TEXT
                        if($types[$key]=='BLOB'){
                            $html.='<td><img src="'.$val.'" style="width:5rem"/></td>';
                        }else $html.='<td align="'.$align.'">'.$val.'</td>';
                    }
                    $html.='<td><a class="war btn btn-warning btn-lg" href="edit.php?t='.$t.'&k='.$k.'&v='.$row[$k].'" role="button">Maj</a></td>';
                    $html.='<td><a class="war btn btn-danger btn-lg" href="delete.php?t='.$t.'&k='.$k.'&v='.$row[$k].'" role="button">Suppr</a></td>';
                    $html.='</tr>';
                }
                echo $html;
            ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <?php
                //Calcule la pagination
                try {
                    $sql='SELECT count(*) AS total FROM '.$t;
                    $qry= $cnn->prepare($sql);
                    $qry->execute();
                }catch (PDOException $err){
                    echo '<p class="alert alert-danger">'.$err->getMessage().'</p>';
                }
                $row=$qry->fetch(PDO::FETCH_ASSOC);
                $pgs= ceil($row['total']/$nb);
                //Affiche la pagination
                $html='<section class="row d-flex">';
                for ($i=1;$i<=$pgs;$i++){
                    $href=$_SERVER['PHP_SELF'].'?t='.$t.'&k='.$k.'&pg='.$i.'&nb='.$nb;
                    $html.='<li class="page-item'.($pg===$i?' active':'').'"><a class="page-link" href="'.$href.'">'.$i.'</a></li>';
                }
                $html.='</section>';
                echo $html;
                unset($cnn);
            ?>
        </ul>
    </nav>
</body>
</html>