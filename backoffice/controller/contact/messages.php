<?php
if($access != 'VALID'){
    header('location:../../index.php');
}if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}
include_once('model/contact/fonctions_messages.php');
$retour = "";
if(isset($_GET['a'])){
    if(message_delete($_GET['a'])){
        $retour = "Le message a bien été supprimé";
    }else{
        $retour = "Il y a eu une erreur lors de la suppression du message, veuillez réessayer";
    }
}

$messages = afficher_messages();
$title = 'Message reçus';
include_once('view/contact/messages.php');