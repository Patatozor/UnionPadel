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
        include_once('model/users/fonctions_users.php');
        $user = afficher_user($_GET['a']);
        $title = 'Edition de l\'utilisateur';
        include_once('view/users/modifier_user.php');
    }
}