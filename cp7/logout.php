<?php
//Démarre ou restaure une session
session_start();
//Détruit les variables de session
session_unset();
// Détruit la session
session_destroy();
//Route vers index.php
header('location:index.php?c=2');//2pour la déconnexion