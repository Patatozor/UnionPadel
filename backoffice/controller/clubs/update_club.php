<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire mise à jour d'un article
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once('model/clubs/fonctions_clubs.php');
    include_once('lib/images.php');
    $club = afficher_club($_GET['a']);
    if(isset($_POST['nom'])){
        if(empty($_FILES['img']['name'])){
            $img = $club['clubimage'];
        }else{
            $img=imageadd($_FILES['img']);
            unlink("../union-padelmvc/assets/img/".$club['clubimage']);
        }
        if(update_club($_GET['a'],$_POST['adresse'],$_POST['nom'],$_POST['lat'],$_POST['long'],$_POST["region"],$_POST['content'],$_POST['tel'],$img)){
            $retour = 'La modification a bien été effectuée';
        }else {
            $retour = 'Il y a eu une erreur lors de la mise à jour du club';
        }
    }
    $url = "?module=clubs&amp;action=clubs";
    $action = "Retourner à la gestion des clubs";
    $title = 'Edition du club';
    include_once('view/retour.php');
}