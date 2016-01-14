<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once("model/contact/fonctions_newsletter.php");
    $title = 'Envoie d\'une Newsletter';
    include_once('view/contact/creer_newsletter.php');
}