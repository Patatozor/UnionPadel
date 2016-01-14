<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once("model/clubs/fonctions_clubs.php");
    $clubs = afficher_clubs();
    $title = 'Ajout de club';
    include_once('view/clubs/club_creer.php');
}