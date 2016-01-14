<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('model/blog/fonctions_blog.php');
include_once('model/shop/fonctions_boutique.php');
$retour = "";


$article = afficher_articles(1);
$produits = afficher_4produits("NULL");
$categoriesa = afficher_categories();
$categoriesp = afficher_categories_shop();
$marques = afficher_marques();
$title = 'Accueil';
include_once('view/home/accueil.php');