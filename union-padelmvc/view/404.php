<?php if($access != 'VALID'){
    header('location:../../index.php');
}?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>Page introuvable</title>
        </head>
        <body>
            <p>La page que vous tentez d'ouvrir n'existe pas</p>
            <a href="#">Retourner à l'accueil</a>
        </body>

    </html>