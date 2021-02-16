<?php
//var_dump($_POST);

//Sécurité : step 2
// Protège les saisies d'une éventuelle injection
$params = [];
foreach ($_POST as $key => $val){
    if(isset($_POST[$key]) && !empty($_POST[$key]))$params[]=htmlspecialchars($_POST[$key]);
    else $params[]=null;
}

// Connexion à la BDD via MYSQLI et vérif
$cnn = mysqli_connect('localhost', 'root', 'greta', 'northwind');
if(mysqli_connect_errno()){
    printf("Erreur de connexion: %s", mysqli_connect_error());
    exit();
}
// Teste si UPDATE ou INSERT
if (isset($_GET['k']) && !empty($_GET['k'])) $update=true;
else $update=false;
//Récupération de l'image à téléverser
var_dump($_FILES);
if (isset($_FILES['PHOTO']) && $_FILES['PHOTO']['error'] !==UPLOAD_ERR_NO_FILE){
    // Variables du fichier
    $file_exts = array('gif', 'jpg', 'jpeg', 'png', 'webbp');
    $file_ext=strtolower(substr($_FILES['PHOTO']['type'], strpos($_FILES['PHOTO']['type'], '/')+1));
    $file_size = $_FILES['PHOTO']['size'];
    $file_temp= $_FILES['PHOTO']['tmp_name'];
    // Teste si pas d'erreurs
    $errors=[];
    if(!in_array($file_ext, $file_exts)){
        $errors[]='<p>Extension du fichier non autorisée : '.implode(',', $file_exts);
    }
    if($file_size> (int) ($_POST['MAX_FILE_SIZE'])){
        $errors[]='<p>Fichier trop lourd : '. ($_POST['MAX_FILE_SIZE']/1024).' Ko maximum';
    }
    // Si pas d'erreurs
    if(empty($errors)){
        //Lire le contenu du fichier à stocker
        $bin=file_get_contents($file_temp);
        $base64 = 'data:'.$file_ext .';base64,'. base64_encode($bin);
        $params[3]= $base64;
    }
    else{
        foreach($errors as $error) echo $error;
        echo'<a href="edit_cat_form.php">Retour au formulaire</a>';
        exit();
    }
}elseif($update) $params[3]= $params[4];




// Sécurité : step 3
// préparation de la requête
$qry = mysqli_stmt_init($cnn);
if ($update) $sql="UPDATE categories SET CODE_CATEGORIE=?, NOM_CATEGORIE=?, DESCRIPTION=?, PHOTO=? WHERE CODE_CATEGORIE=?";
else $sql = "INSERT INTO categories(CODE_CATEGORIE, NOM_CATEGORIE, DESCRIPTION, PHOTO) VALUES(?, ?, ?, ?)";
if(mysqli_stmt_prepare($qry,$sql)){
    // Lie les paramètres à la requête préparée
    if ($update) mysqli_stmt_bind_param($qry,"isssi", $params[0], $params[1], $params[2], $params[3], $_GET['k']);
    else mysqli_stmt_bind_param($qry,"isss", $params[0], $params[1], $params[2], $params[3]);
    // Execute la requête
    mysqli_stmt_execute($qry);
    // Ferme le statement
    mysqli_stmt_close($qry);
}
mysqli_close($cnn);
header('location:bo.php');
// https://www.php.net/manual/en/mysqli-stmt.prepare.php