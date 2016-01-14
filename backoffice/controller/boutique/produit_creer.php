<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once("model/boutique/fonctions_boutique.php");
    $categories = afficher_categories();
    $title = 'Ajout de produit';
    include_once('view/boutique/produit_creer.php');
}