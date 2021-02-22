<?php
include_once('test_session.php');
include_once('pdo_connect.php');
$t=$_GET['t'];
$k=$_GET['k'];
$v=$_GET['v'];
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
<?php
if (!isset($_GET['t']) || empty($_GET['t']) || !isset($_GET['k']) || empty($_GET['k']) || !isset($_GET['v'])){
        echo '<p><strong>Attention ! </strong> Aucune donnée à afficher : <a href="bo.php">retour au back-office</a></p>';
        exit();
}
?>
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
            <li class="breadcrumb-item">Back-office</li>
            <li class="breadcrumb-item"><a href="<?php echo 'list.php?t='.$t.'&k='.$k;?>">Liste</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editions</li>
        </ol>
    </nav>

    <form action="save.php?<?php echo $_SERVER['QUERY_STRING'] ?>" method="post">
    <?php
    // Prepare la requete
    try{
        if(!empty($v)){
        $sql="SELECT * from $t WHERE $k=?";
        $qry=$cnn->prepare($sql);
        $vals=array($v);
        $qry->execute($vals);
        $row=$qry->fetch(PDO::FETCH_ASSOC);
        }else{
            $sql="SELECT * from $t WHERE 1=2";
            $qry=$cnn->prepare($sql);
            $qry->execute();
            for($i=0;$i<$qry->columnCount();$i++){
                $row[$qry->getColumnMeta($i)['name']]='';
            }
        }
        // Ajoute LABEL/INPUT
        $html='';
        foreach($row as $key=>$val){
            $html.='<div class="form-group"';
            $html.='<label for="'.$key.'">'.$key.'</label>';
            $html.='<input class="form-control" type="text" id="'.$key.'" name="'.$key.'" value="'.$val.'"/>';
            $html.='</div>';
        }
        $html.='<input type="submit" value="Send" class="btn btn-primary" id="send">';
        echo $html;
    }catch (PDOException $err){
        echo '<p class="alert alert-danger">'.$err->getMessage().'</p>';
    }
    ?>
    </form>
</body>
</html>