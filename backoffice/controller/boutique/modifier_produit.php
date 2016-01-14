<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    if(isset($_GET['a'])){
        include_once('model/boutique/fonctions_boutique.php');
        $categories = afficher_categories();
        $produit = afficher_produit($_GET['a']);
        $title = 'Edition du produit';
        include_once('view/boutique/modifier_produit.php');
    }
}