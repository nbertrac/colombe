<?php
// Si mode UPDATE : Querystring
$row = [];
if (isset($_GET['k']) && !empty($_GET['k'])) {
    $cnn = mysqli_connect('localhost', 'root', 'root', 'northwind');
    $res = mysqli_query($cnn, 'SELECT * FROM categories WHERE code_categorie=' . $_GET['k']);
    $row = mysqli_fetch_assoc($res);
}
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
    <h1>Edition des catégories</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
            <li class="breadcrumb-item"><a href="edit_cat_list.php">Liste catégories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edition catégories</li>
        </ol>
    </nav>

    <form action="edit_cat_proc.php<?php echo ($_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : ''); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="CODE_CATEGORIE">Code catégorie : </label>
            <input type="number" name="CODE_CATEGORIE" id="CODE_CATEGORIE" class="form-control" pattern="[0-9]{1,6}" required value="<?php echo (!empty($row) ? $row['CODE_CATEGORIE'] : ''); ?>">
        </div>
        <div class="form-group">
            <label for="NOM_CATEGORIE">Nom catégorie : </label>
            <input type="text" name="NOM_CATEGORIE" id="NOM_CATEGORIE" class="form-control" required pattern="[a-zA-Z\u00C0-\u00FF '\-]{1,25}" value="<?php echo (!empty($row) ? $row['NOM_CATEGORIE'] : ''); ?>">
        </div>
        <div class="form-group">
            <label for="DESCRIPTION">Description : </label>
            <textarea name="DESCRIPTION" id="DESCRIPTION" class="form-control"><?php echo (!empty($row) ? $row['DESCRIPTION'] : ''); ?></textarea>
        </div>
        <div class="form-group">
            <label for="PHOTO">Photo :</label>
            <input type="file" name="PHOTO" id="PHOTO" class="form-control" accept=".gif,.jpg,.jpeg,.png,.webp">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000">
            <input type="hidden" name="TEST" value="<?php echo (!empty($row) ? $row['PHOTO'] : ''); ?>">
        </div>
        <input type="submit" value="Enregistrer" class="btn btn-primary">
    </form>

</body>

</html>