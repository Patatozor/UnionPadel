<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('lib/panier.php');
include_once('model/shop/fonctions_boutique.php');
$nbarticles = panier_nombre_lignes();
$prixtot = panier_calculer();
$paniers = panier_lire();
$categoriesp = afficher_categories_shop();
$marques = afficher_marques();
$title = 'Votre panier';
include_once('view/shop/panier.php');