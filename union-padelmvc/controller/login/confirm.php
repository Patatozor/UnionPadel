<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
include_once('model/connexion/fonctions_connexion.php');
if(isset($_GET['m'])){
    if(activer($_GET['m'])){
        $retour = "Votre compte a bien été activé";
    }else{
        $retour = "Il y a eu une erreur lors de l'activation de votre compte";
    }
}else{
    header("location:?module=home&action=accueil");
}
$title = 'Confirmation d\'inscription';
include_once('view/retour.php');
