<?php
if($access != 'VALID'){
    header('location:../../index.php');
}?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <title><?php echo $title ?></title>
            <meta charset="utf-8" />
            <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" />
        </head>
        <body>
        <?php if(isset($_SESSION['id'])) { ?>
            <header>
                <nav>
                    <ul class="nav nav-pills">
                        <li><a href="?module=home&amp;action=home">Accueil</a></li>
                        <li><a href="?module=contact&amp;action=newsletter">Contacts newsletter</a></li>
                        <li><a href="?module=contact&amp;action=newsletter_creer">Envoyer une newsletter</a></li>
                        <li><a href="?module=contact&amp;action=messages">Messages reçus</a></li>
                        <li><a href="?module=users&amp;action=users">Gérer les utilisateurs</a></li>
                        <li><a href="?module=users&amp;action=admins">Gérer les comptes administrateur</a></li>
                        <li><a href="?module=blog&amp;action=categories">Gérer les catégories blog</a></li>
                        <li><a href="?module=blog&amp;action=articles">Gérer les articles blog</a></li>
                        <li><a href="?module=boutique&amp;action=categories">Gérer les catégories de produit</a></li>
                        <li><a href="?module=boutique&amp;action=produits">Gérer les produits</a></li>
                        <li><a href="?module=clubs&amp;action=clubs">Gérer les clubs</a></li>
                    </ul>
                </nav>
            </header>
        <?php } ?>
            <div id="content">
