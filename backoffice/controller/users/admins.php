<?php
if($access != 'VALID'){
    header('location:../../index.php');
}if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}
include_once('model/users/fonctions_admins.php');
$retour = "";
if(isset($_GET['a'])){
    include_once('model/users/fonctions_admins.php');
    if(delete_admin($_GET['a'])){
        $retour = 'La suppression a bien été effectuée';
    }else{
        $retour = "La suppression a echoué, veuillez réessayer";
    }
}


$admins = afficher_admins();
$title = 'Gestion des Administrateurs';
include_once('view/users/gestion_admins.php');

