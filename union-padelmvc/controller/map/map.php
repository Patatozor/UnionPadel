<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('model/club/fonctions_club.php');
$retour = "";
if(isset($_POST['region'])){
    $reg = $_POST['region'];
    $clubs = afficher_clubs_liste($reg);
}else{
    $clubs = afficher_clubs();
}

$regions = afficher_regions();
$title = 'Annuaire des clubs de Padel';
include_once('view/map/map.php');