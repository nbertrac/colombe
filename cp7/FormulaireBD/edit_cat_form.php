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
            <li class="breadcrumb-item"><a href="edit_cat_list.php">Liste des catégories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editions catégories</li>
        </ol>
    </nav>

    <form action="edit_cat_proc.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="CODE_CATEGORIE">Code catégorie : </label>
        <input type="number" name="CODE_CATEGORIE" id="CODE_CATEGORIE" class="form-control" pattern="[0-9]{1,6}" required>
    </div>
    <div class="form-group">
        <label for="NOM_CATEGORIE">Code catégorie : </label>
        <input type="text" name="NOM_CATEGORIE" id="NOM_CATEGORIE" class="form-control" pattern="[A-Za-z '\-]{1,25}" required>
    </div>
    <div class="form-group">
        <label for="DESCRIPTION">Description : </label>
        <textarea name="DESCRIPTION" id="DESCRIPTION" cols="30" rows="3" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="PHOTO">Photo : </label>
        <input type="file" name="PHOTO" id="PHOTO" class="form-control" accept=".gif,.jpg,.jpeg,.png,.webp">
        <input type="hidden" name="MAX_FILE_SIZE" value="512000">
    </div>
    <input type="submit" value="Enregistrer" class="btn btn-primary">
    </form>
</body>
</html>