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
        include_once("model/users/fonctions_users.php");
        $user = afficher_user($_GET['b']);
        $title = $user['Usersnom_affichage'];
        include_once("view/users/afficher_user.php");
    }
}