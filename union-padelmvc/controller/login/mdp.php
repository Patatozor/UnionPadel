<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
$retour = '';
include_once('model/user/fonctions_user.php');
if(isset($_POST['mail'])){
    if(afficher_user_mail($_POST['mail'])){
        $user = afficher_user_mail($_POST['mail']);
        $retour = 'Un mail vous a été envoyé pour réinitialiser votre mot de passe';
        $html = '<!DOCTYPE html><html><head><meta charset="utf-8"/></head><body><p>Veuillez cliquer sur le lien ci_dessous pour modifier votre mot de passe : <br/><a href="ns366377.ovh.net/fumeron/UnionPadel/union-padelmvc/index.php?module=login&amp;action=mdp_change&amp;m='.$_POST['mail'].'&amp;id='.$user['Usersmdp'].'">Modifier le mot de passe</a></p></body></html>';
        mail_confirm(EXPEDITEUR,MAIL,MAIL,$_POST['mail'],"","Confirmation d'inscription Union Padel","",$html,"");
    }else{
        $retour = 'Aucun compte n\'est associé à cette adresse mail';
    }
}else{
    header("location:?module=home&action=accueil");
}
$title = 'Mot de passe oublié';
include_once('view/retour.php');
