<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once('model/users/fonctions_users.php');
    if(isset($_POST['mail'])){
        if($_POST['mdp']==$_POST['mdp2']){
            $mdp = crypt($_POST['mdp'], SEL);
            if(ajout_user($_POST['mail'], $mdp, $_POST['nom'],$_POST['pseudo'],$_POST['type'])){
                $retour = 'Le nouvel utilisateur a bien été ajouté';
            }else{
                $retour = 'Il y a eu une erreur lors de l\'ajout du nouvel utilisateur';
            }
        }else{
            $retour = 'Les mots de passe que vous avez entrés ne sont pas identiques';
        }
    }
    $url = "?module=users&amp;action=users";
    $action = "Ajouter un autre utilisateur";
    $title = 'Ajout d\'utilisateur';
    include_once('view/retour.php');
}