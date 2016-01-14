<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(isset($_GET['b'])){
    include_once("model/shop/fonctions_boutique.php");
    $produit = afficher_produit($_GET['b']);
    $categoriesp = afficher_categories_shop();
    $marques = afficher_marques();
    $title = $produit['Produitnom'];
    include_once("view/shop/fiche_produit.php");
}
