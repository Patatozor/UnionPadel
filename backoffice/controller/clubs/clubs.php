<?php
if($access != 'VALID'){
    header('location:../../index.php');
}if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}
include_once('model/clubs/fonctions_clubs.php');
$retour = "";
if(isset($_GET['a'])){
    if(delete_club($_GET['a'])){
        $retour = 'La suppression a bien été effectuée';
    }else{
        $retour = "La suppression a echoué, veuillez réessayer";
    }
}

$clubs = afficher_clubs();
$title = 'Gestion des clubs';
include_once('view/clubs/clubs.php');
