<?php
if($access != 'VALID'){
    header('location:../../index.php');
}if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}
include_once('model/contact/fonctions_newsletter.php');
$retour = "";
if(isset($_GET['a'])){
    if(newsletter_delete($_GET['a'])){
        $retour = "Le contact newsletter a bien été supprimé";
    }else{
        $retour = "Il y a eu une erreur lors de la suppression du contact newsletter, veuillez réessayer";
    }
}

$newsletters = afficher_newsletter();
$title = 'Message reçus';
include_once('view/contact/newsletter.php');