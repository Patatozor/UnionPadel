<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('model/blog/fonctions_blog.php');
include_once('model/shop/fonctions_boutique.php');
$retour = "";


$article = afficher_articles(1);
$produits = afficher_4produits("NULL");
$title = 'Accueil';
include_once('view/home/accueil.php');