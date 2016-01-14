<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('model/shop/fonctions_boutique.php');
if(isset($_GET['a'])){
    $produit = afficher_produit($_GET['a']);
    if($_POST['quantite']=='' OR $_POST['quantite']<1){
        $qt = 1;
    }else{
        $qt = $_POST['quantite'];
    }
    if(!isset($_POST['taille'])){
        $taille = '';
    }else{
        $taille = $_POST['taille'];
    }
    panier_ajouter($_GET['a'],$produit['Produitnom'],$produit['Produitmarque'],$produit['produitimg'],$produit['Produitprix'],$qt,$taille);
}
if(isset($_GET['d'])){
    panier_supprimer_ligne($_GET['d']);
}
if(isset($_GET['v'])){
    panier_vider();
    panier_creer();
}
$title = 'Votre panier';
$categoriesp = afficher_categories_shop();
$marques = afficher_marques();
$nbarticles = panier_nombre_lignes();
$prixtot = panier_calculer();
$paniers = panier_lire();
include_once('view/shop/panier.php');