<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
$retour = '';
include_once('model/connexion/fonctions_connexion.php');
include_once('model/user/fonctions_user.php');
if(isset($_GET['m']) AND isset($_GET['id'])){
    if(connexion($_GET['m'],$_GET['id'],'connect')){
        $id = connexion($_GET['m'],$_GET['id'],'fetch');
        include_once('view/login/mdp_change.php');
    }else{
        $retour = "Il y a eu une erreur lors du traitement";
        $title = 'Erreur';
        include_once('view/retour.php');
    }
}elseif(isset($_POST['mdp'])) {
    if ($_POST['mdp'] == $_POST['mdp2']) {
        $mdp = crypt($_POST['mdp'], SEL);
        if(update_user_mdp($_GET['id'],$mdp)){
            $retour = "Le changement de mot de passe a été effectué";
        }else{
            $retour = "Il y a eu une erreur lors du changement de mot de passe";
        }
        include_once('view/retour.php');
    } else {
        header("location:?module=home&action=accueil");
    }
}


