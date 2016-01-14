<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
    if(isset($_SESSION['id'])){
        include_once("model/user/fonctions_user.php");
        $user = afficher_user($_SESSION['id']);
        $title = "Votre compte";
        $retour = '';
        include_once("view/user/compte.php");
    }else{
        header("location:?module=login&action=login");
    }
