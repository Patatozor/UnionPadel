<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('model/shop/fonctions_boutique.php');
$retour = "";
if(isset($_GET['c'])){
    $cat = $_GET['c'];
    $produits = afficher_produits($cat);
}else{
    $cat = 0;
    $produits = afficher_produits($cat);
}
if(isset($_POST['marque']) and $_POST['marque']!=""){
    $cat = $_POST['marque'];
    $produits = afficher_produits_marque($cat);
}
if(isset($_POST['produit_recherche'])and $_POST['produit_recherche']!=""){
    $cat = $_POST['produit_recherche'];
    $produits = afficher_produits_tri($cat);
}

$marques = afficher_marques();
$categoriesp = afficher_categories_shop();
$title = 'Liste des produits';
include_once('view/shop/liste.php');