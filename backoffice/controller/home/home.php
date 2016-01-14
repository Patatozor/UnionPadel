<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire connexion admin
if(!isset($_SESSION['admin'])){
    //header('location:../../index.php');
}else{
    include_once('model/contact/fonctions_newsletter.php');
    include_once('model/contact/fonctions_messages.php');
    include_once('model/users/fonctions_users.php');
    $title = 'Accueil';
    include_once('view/home/home.php');
}