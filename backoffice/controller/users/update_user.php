<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire mise à jour d'un article
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once('model/users/fonctions_users.php');
    if(isset($_POST['mail'])){
        if($_POST['mdp']==$_POST['mdp2']) {
            $mdp = crypt($_POST['mdp'], SEL);
            if(update_user($_GET['a'], $_POST['mail'],$mdp, $_POST['nom'], $_POST['pseudo'], $_POST['type'])){
                $retour = 'La modification a bien été effectuée';
            }else {
                $retour = 'Il y a eu une erreur lors de la mise à jour de l\'article';
            }
        }else{
                $retour = "Les mots de passe saisis ne sont pas identiques";
        }
    }
    $url = "?module=blog&amp;action=articles";
    $action = "Retourner à la gestion des articles";
    $title = 'Edition de l\'article';
    include_once('view/retour.php');
}