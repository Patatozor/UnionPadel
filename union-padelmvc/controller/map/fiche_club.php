<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(isset($_GET['b'])){
    include_once("model/club/fonctions_club.php");
    $club = afficher_club($_GET['b']);
    $regions = afficher_regions();

    $title = $club['clubnom'];
    include_once("view/map/fiche_club.php");
}
