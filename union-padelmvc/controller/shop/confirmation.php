<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('model/shop/fonctions_boutique.php');
$categoriesp = afficher_categories_shop();
$marques = afficher_marques();
$title = 'Confirmation de l\'achat';
include_once('view/shop/confirmation.php');