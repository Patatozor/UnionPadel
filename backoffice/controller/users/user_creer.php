<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once("model/users/fonctions_users.php");
    $title = 'Ajout d\'un utilisateur';
    include_once('view/users/creer_user.php');
}