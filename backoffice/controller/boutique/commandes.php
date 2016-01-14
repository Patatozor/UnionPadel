<?php
if($access != 'VALID'){
    header('location:../../index.php');
}if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}
include_once('model/boutique/fonctions_boutique.php');
$retour = "";

$commandes = afficher_commandes();
$title = 'Commandes';
include_once('view/boutique/commandes.php');