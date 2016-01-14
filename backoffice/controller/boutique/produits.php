<?php
if($access != 'VALID'){
    header('location:../../index.php');
}if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}
include_once('model/boutique/fonctions_boutique.php');
$retour = "";
if(isset($_GET['a'])){
    if(produit_delete($_GET['a'])){
        $retour = "Le produit a bien été supprimé";
    }else{
        $retour = "Il y a eu une erreur lors de la suppression du produit, veuillez réessayer";
    }
}

$categories = afficher_categories();
if(isset($_POST["cat"])){
    $cat=$_POST['cat'];
}else{
    $cat="NULL";
}
$produits = afficher_produits($cat);
$title = 'Gestion des produits';
include_once('view/boutique/produits.php');