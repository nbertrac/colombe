<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northwind Traders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body class="container">
    <h1>Accès boîte aux lettres Gmail</h1>
    <table class="table-striped">
        <thead>
            <th>DE</th>
            <th>OBJ</th>
            <th>RECU LE</th>
            <th>TAILLE</th>
        </thead>
        <tbody>
            <?php
                include_once('constants.php');
                $seen=false;
                //Tentative de connexion à la BAL
                $inbox=imap_open(MB_HOST, MB_USER, MB_PASS) or die ('<div class="alert alert-danger">Connexion au serveur de messagerie impossible : '.imap_last_error().'</div>');
                // Récupaire tous les mails
                $emails=imap_search($inbox, 'ALL');
                // S'il y a des emails
                if ($emails){
                    $html='';
                    // Tri du plus récent au plus ancien
                    rsort($emails);
                    // Pour chaque mail
                    foreach($emails as $id){
                        // Lit lesinfos de l'email
                        $email=imap_fetch_overview($inbox, $id);
                        $html.='<tr style="font-weight:'.($email[0]->seen ?'':'bold').'">';
                        $html.='<td>'.imap_utf8($email[0]->from).'</td>';
                        $html.='<td><a href="gmail_read.php?id='.$id.'" target="_blank">'.imap_utf8($email[0]->subject).'</a></td>';
                        $html.='<td>'.date("Y-m-d H:i:s",imap_utf8($email[0]->udate)).'</td>';
                        $html.='<td>'.round(imap_utf8($email[0]->size)/1024).' Ko</td>';
                        $html.='</tr>';
                    }
                    echo $html;
                }
                imap_close($inbox);
            ?>
        </tbody>
    </table>
</body>
</html>