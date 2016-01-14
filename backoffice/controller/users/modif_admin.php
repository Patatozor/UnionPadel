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
        include_once('model/users/fonctions_admins.php');
        $admin = afficher_admin($_GET['a']);
        $title = 'Edition d\'utilisateur';
        include_once('view/users/modif_admin.php');
    }
}