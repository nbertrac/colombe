<?php
// Tester avec MYSQLI si le user est reconnu ou pas:
//1. connexion à bdd
//2. requête préparée pour verifier si mail + pass trouvés
//2a. si oui alors afficher message d'erreur
//2b. si non alors créer un novel user avec role app.read
include_once('constants.php');
$cnn=mysqli_connect(HOST, USER, PASS, DB);
if (mysqli_connect_errno()) {
    printf('Erreur de connexion', mysqli_connect_error());
    exit();
}

$qry = mysqli_stmt_init($cnn);
$sql = 'SELECT COUNT(*) AS nb FROM users WHERE mail=?';
if(mysqli_stmt_prepare($qry,$sql)){
    $m = MD5(htmlspecialchars($_POST['mail']));
    mysqli_stmt_bind_param($qry,'s', $m);
    mysqli_stmt_execute($qry);
    mysqli_stmt_bind_result($qry,$nb);
    mysqli_stmt_close($qry);
}
if($nb) echo 'Cette adresse mail est déja enregistrée : '.$_POST['mail'];
else{
    $qry = mysqli_stmt_init($cnn);
    $ins= "INSERT INTO users(mail, fname, pass, land, active) VALUES(?, ?, ?, ?, ?)";
    $gr='GRANT app_write TO ?';
    $sd='SET DEFAULT ROLE app_write TO ?';
    if(mysqli_stmt_prepare($qry,$ins)){
        $f=htmlspecialchars($_POST['fname']);
        $p=hash('sha512', sha1(htmlspecialchars($_POST['pass'])), false);
        $l=htmlspecialchars($_POST['land']);
        $a=0;
        mysqli_stmt_bind_param($qry,'ssssi', $m, $f, $p, $l, $a);
        $res = mysqli_stmt_execute($qry);
        mysqli_stmt_close($qry);

        //ENvoi d'un mail pour confirmation si succès
        if($res) {
            // Le corp du mail
            $url='http://'. $_SERVER['HTTP_HOST']. '/colombe/cp7/register2.php?m'.$mail;
            $html='';
            $html.='<h1>Inscription Northwind Traders</h1>';
            $html.='<p>Bonjour '. $_POST['fname'].' et bienvenu(e) sur notre site.';
            $html.='<p>Clique sur le lien suivant pour valider ton inscription : <a href"'. $url .'">'. $url .'</a>';
            $html.='<p>A très bientôt!';
            // En-tête du mail
            $header="MIME-Version: 1.0 \n"; //Version MIME
            $header.="Content-type: text/html; charset=utf-8 \n"; //Format du mail
            $header.="From: 60kanata06@gmail.com \n"; //Expediteur
            $header.="Reply-to: manu@elysees.gouv.fr \n"; //Destinataire de la réponse
            $header.="Disposition-Notification-To: nbertrac@gmail.com \n";//Accusé de récéption
            $header.="X-Priority: 1 \n"; //Activation importance
            //$header.="X-MSMail-Priority: High \n"; //Pour MS(microsoft)
            //Envoi du mail
            //Pour linux, installer un serveur de messagerie : http://www.postfix.org
            $res2=mail($_POST['mail'], 'Northwind Traders', $html, $header);
            echo ($res2?'Success':'Echec');
        }else echo 'Echec dans l\'Ajout du user';
    }
    /*if(mysqli_stmt_prepare($qry,$gr)){
        mysqli_stmt_bind_param($qry,'s', $f);
        mysqli_stmt_execute($qry);
        mysqli_stmt_fetch($qry);
    }
    if(mysqli_stmt_prepare($qry,$sd)){
        mysqli_stmt_bind_param($qry,'s', $f);
        mysqli_stmt_execute($qry);
        mysqli_stmt_fetch($qry);
    }*/
}

mysqli_close($cnn);