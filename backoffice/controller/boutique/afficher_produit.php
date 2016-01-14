<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    if(isset($_GET['b'])){
        include_once("model/boutique/fonctions_boutique.php");
        $produit = afficher_produit($_GET['b']);
        $title = $produit['Produitnom'];
        include_once("view/boutique/afficher_produit.php");
    }
}