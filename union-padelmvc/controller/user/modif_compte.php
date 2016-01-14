<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
$retour = '';
include_once('model/user/fonctions_user.php');
if(isset($_POST['nom'])){
    if($_POST['mdp']==$_POST['mdp2']){
        $mdp = crypt($_POST['mdp'], SEL);
        if(update_user($_GET['id'],$_POST['mail'],$mdp,$_POST['nom'],$_POST['pseudo'],$_POST['sexe'])){
            if($_POST['newsletter']==1){
                ajout_newsletter($_POST['mail']);
            }
        }else{
            $retour = 'Cette adresse email est déjà utilisée';
        }
    }else{
        $retour = 'Les mots de passe que vous avez entrés ne sont pas identiques';
    }
}
$title = 'Votre compte';
include_once('view/user/compte.php');