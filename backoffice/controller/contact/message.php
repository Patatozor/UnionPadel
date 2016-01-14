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
        include_once('model/contact/fonctions_messages.php');
        $message = afficher_message($_GET['a']);
        $title = 'Message reçu';
        include_once('view/contact/afficher_message.php');
    }
}