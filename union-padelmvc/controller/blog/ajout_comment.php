<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

$retour = '';

    if(isset($_POST['content'])){
        include_once('model/blog/fonctions_blog.php');
        if(ajout_commentaire($_GET['b'],$_POST['content'],$_SESSION['id']))
        {
            $retour = 'Votre commentaire a été ajouté';
        }else{
            $retour = "Il y a eu une erreur lors de l'ajout de votre commentaire";
        }
    }else{
        $retour = 'Il y a eu une erreur lors du traitement, veuillez réessayer';
    }
$location = "location:?module=blog&amp;action=article&amp;b=".$_GET['b'];
header($location);