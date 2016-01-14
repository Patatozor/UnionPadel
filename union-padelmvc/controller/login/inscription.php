<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
    include_once('model/connexion/fonctions_connexion.php');
    if(isset($_POST['login'])){
        if($_POST['mdp']==$_POST['mdp2']){
            $mdp = crypt($_POST['mdp'], SEL);
            if(ajout_user($_POST['login'],$mdp,$_POST['nom'],$_POST['pseudo'],$_POST['type'])){
                $retour = 'Votre compte a été enregistré, vous allez recevoir un mail de confirmation';
                $html = '<html><body><p>Votre compte a bien été créé, veuillez cliquer sur le lien ci-dessous pour valider votre inscription : <br /><a href="ns366377.ovh.net/fumeron/UnionPadel/union-padelmvc/index.php?module=login&amp;action=confirm&amp;m='.$_POST['login'].'">Confirmer l\'inscription</a></p></body></html>';
                mail_confirm(EXPEDITEUR,MAIL,MAIL,$_POST['login'],"","Confirmation d'inscription Union Padel","",$html,"");
                if($_POST['newsletter']==1){
                    ajout_newsletter($_POST['login']);
                }
            }else{
                $retour = 'Cette adresse email est déjà utilisée';
            }
        }else{
            $retour = 'Les mots de passe que vous avez entrés ne sont pas identiques';
        }
    }
    $title = 'Inscription';
    include_once('view/retour.php');
