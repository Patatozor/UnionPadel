<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once("model/contact/fonctions_newsletter.php");
    $contacts = afficher_newsletter();
    $mail = "";
    foreach($contacts as $contact){
        $mail .= $contact['contact_newsletter_mail'].",";
    }
    if(envoie_newsletter("Union Padel",MAIL,MAIL,$mail,MAIL,$_POST['title'],"",$_POST['content'],"")){
        $retour = "La newsletter a bien été envoyée à tous les contacts newsletter";
    }else{
        $retour = "Il y a eu une erreur lors de l'envoi de la newsletter";
    }
    $title = 'Envoie d\'une Newsletter';
    include_once('view/retour.php');
}