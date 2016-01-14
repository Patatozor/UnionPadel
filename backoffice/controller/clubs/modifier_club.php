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
        include_once('model/clubs/fonctions_clubs.php');
        $club = afficher_club($_GET['a']);
        $title = 'Edition du club';
        include_once('view/clubs/modifier_club.php');
    }
}