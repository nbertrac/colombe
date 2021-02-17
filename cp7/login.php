<?php
// 1. Verif et sécurisation des variables $_POST
// isset, !empty et htmlspecialchars
// 2. Crypter l'adresse mail et le mot de passe
// 3 Tester via connexion PDO si l'utilisateur existe (SELECT COUNT(*)) => ou SELECT * => rowCount()
// 3a Si recconue als router vers bo.php
// 3b Sinon router vers index.php avec variable dans querystring -> afficher message dans index.php.
include_once('constants.php');
if (isset($_POST['mail']) && !empty($_POST['mail']) & isset($_POST['pass']) && !empty($_POST['pass'])){
    try{
        $cnn=new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS);
        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $m = MD5(htmlspecialchars($_POST['mail']));
        $p=hash('sha512', sha1(htmlspecialchars($_POST['pass'])), false);
        $req='SELECT * FROM users WHERE mail = ? AND pass = ?';
        $qry=$cnn->prepare($req);
        $vals=array($m, $p);
        $qry->execute($vals);
        if($qry->rowCount()===1){
            // Démarage session et stockage variable de session
            session_start();
            $row=$qry->fetch(PDO::FETCH_ASSOC);
            $_SESSION['connected']=true;
            $_SESSION['session_id']= session_id();
            $_SESSION['$fname']= $row['fname'];
            $_SESSION['mail']= $_POST['mail'];
            //Route vers bo.php
            header('location:bo.php');
        }else {
            unset($cnn);
            header('location:index.php?c=1');
        }
    }catch (PDOException $err) {
        echo '<p class="alert alert-danger">'.$err->getMessage().'</p>';
    }
}else{
    header('location:index.php');
}

/* OR
$req='SELECT COUNT(*) as test FROM users WHERE mail = ? AND pass = ?';
$qry=$cnn->prepare($req);
$vals=array($m, $p);
$qry->execute($vals);
while($row=$qry->fetch(PDO::FETCH_ASSOC))
if($row['test']){
    unset($cnn); 
    header('location:bo.php');
}else {
    unset($cnn);
    header('location:index.php?tried=1');
}
*/