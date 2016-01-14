<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once('model/clubs/fonctions_clubs.php');
    if(isset($_POST['nom'])){
        include_once('lib/images.php');
        $img=imageadd($_FILES['img']);
        if(ajout_club($_POST['adresse'],$_POST['nom'],$_POST['lat'],$_POST['long'],$_POST["region"],$_POST['content'],$_POST['tel'],$img)){
            $retour = 'Le nouveau club a bien été ajouté';
        }else{
            $retour = 'Il y a eu une erreur lors de l\'ajout du nouveau club';
        }
    }
    $url = "?module=clubs&amp;action=clubs";
    $action = "Ajouter un autre club";
    $title = 'Ajout de club';
    include_once('view/retour.php');
}