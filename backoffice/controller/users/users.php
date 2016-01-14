<?php
if($access != 'VALID'){
    header('location:../../index.php');
}if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}
include_once('model/users/fonctions_users.php');
$retour = "";
if(isset($_GET['a'])){
    if(delete_user($_GET['a'])){
        $retour = 'La suppression a bien été effectuée';
    }else{
        $retour = "La suppression a echoué, veuillez réessayer";
    }
}
if(isset($_GET['s']) AND isset($_GET['b'])){
    if(activer_user($_GET['s'],$_GET['b'])){
        $retour = 'L\'opération a été effectuée avec succès';
    }else{
        $retour = "L'opération a echoué";
    }
}


$users = afficher_users();
$title = 'Gestion des utilisateurs';
include_once('view/users/users.php');
