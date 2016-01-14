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
        include_once("model/clubs/fonctions_clubs.php");
        $club = afficher_club($_GET['b']);
        $title = $club['clubnom'];
        include_once("view/clubs/afficher_club.php");
    }
}